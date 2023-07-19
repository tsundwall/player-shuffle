from string import ascii_lowercase
import pandas as pd
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait as DriverWait
from selenium.webdriver.support.ui import WebDriverWait as DriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located as Presence
from selenium.webdriver.support.expected_conditions import presence_of_all_elements_located as Presences
import time
import json
import tqdm
import requests

use_selenium = True

df = pd.read_csv("players.csv")

teams_directory = {}

if use_selenium:

    chrome_options = Options()
    chrome_options.page_load_strategy = 'eager'
    chrome_options.add_experimental_option('excludeSwitches', ['enable-logging'])
    chrome_options.add_extension('C:\\Users\\Tanner\\Documents\\grid\\Adblock.crx')
    chrome_options.headless = False
    driverPath = "chromedriver.exe"
    driver = webdriver.Chrome(options = chrome_options,executable_path=driverPath)
    driver.get("https://www.baseball-reference.com/")
    time.sleep(15)
    ct = 0
    for _,_,name,year,link,_,_ in tqdm.tqdm(df[19500:].itertuples(),total=df[19500:].shape[0]):
        ct += 1
        driver.get(link)
        tbl = pd.read_html(driver.find_elements(By.CLASS_NAME,"stats_table")[0].get_attribute('outerHTML'))[0]
        try:
            tbl.columns = tbl.columns.droplevel(0)
        except:
            pass
        score = ""
        hof = driver.find_elements(By.CSS_SELECTOR,"[data-label='Hall of Fame Monitor']")
        if len(hof) != 0:
            score = hof[0].find_elements(By.XPATH,"..")[0].find_elements(By.XPATH,"..")[0].find_elements(By.TAG_NAME,"div")[2].find_elements(By.TAG_NAME,"p")[0].find_elements(By.TAG_NAME,"b")[0].text

        if 'Tm' in tbl.columns:
            teams = set(tbl['Tm'].values.tolist())#[val for sublist in tbl['Tm'].values.tolist() for val in sublist]
        else:
            print('no teams')
            continue
        img_url = ""
        img_element = driver.find_elements(By.CLASS_NAME,"media-item")       
        if len(img_element) != 0:
            img_url = img_element[0].find_elements(By.TAG_NAME,"img")[0].get_attribute('src')
            img = requests.get(img_url).content
            with open("imgs/" + img_url.split("/")[-1], 'wb') as handler:
                handler.write(img)

        college = ""
        div_num = 1
        no_thumb = driver.find_elements(By.CLASS_NAME,"nothumb")
        if no_thumb:
            div_num = 0

        for detail in driver.find_element(By.ID,"meta").find_elements(By.TAG_NAME,"div")[div_num].find_elements(By.TAG_NAME,"p"):
            bold = detail.find_elements(By.TAG_NAME,"strong")
            if len(bold) != 0:
                if bold[0].text == 'College':
                    college = detail.find_elements(By.TAG_NAME,"a")[0].text
            

        for team in teams:
            if team in teams_directory:
                teams_directory[team].append([name,year,score,college])
            else:
                teams_directory[team] = [[name,year,score,college]]
        if ct % 100 == 0:
            with open("sample.json", "w") as outfile:
                json.dump(teams_directory, outfile)

else:
    ct = 0
    for _,_,name,_,link in df.itertuples():
        ct += 1
        tbl = pd.read_html(link, attrs={"class":"stats_table"})[0]
        time.sleep(2)
        print(str(ct) + " of " + str(len(df)))
        tbl.columns = tbl.columns.droplevel(0)
        if 'Tm' in tbl.columns:
            teams = set(tbl['Tm'].values.tolist())
        else:
            print('no teams')
            continue

        for team in teams:
            if team in teams_directory:
                teams_directory[team].append(name)
            else:
                teams_directory[team] = [name]

        with open("sample.json", "w") as outfile:
            json.dump(teams_directory, outfile)