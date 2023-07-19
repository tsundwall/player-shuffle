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

df = pd.read_csv("players_mlb.csv")


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
for _,_,name,year,link in tqdm.tqdm(df.itertuples(),total=df.shape[0]):
    id=link.split('/')[-1].split('.')[0]
    tbl_pitching = None
    tbl_batting = None
    driver.get(link)
    try:
        tbl_pitching = pd.read_html(driver.find_element(By.ID,"all_pitching_standard").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        pass   

    try:
        tbl_pitching.columns = tbl_pitching.columns.droplevel(0)
    except:
        pass
    try:
        tbl_batting = pd.read_html(driver.find_element(By.ID,"all_batting_standard").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        pass   

    try:
        tbl_batting.columns = tbl_pitching.columns.droplevel(0)
    except:
        pass
    
    if tbl_pitching is not None:
        tbl_pitching.to_csv('stats_mlb/pitching/' + name + ' ' + id + '_pitching.csv')
    if tbl_batting is not None:
        tbl_batting.to_csv('stats_mlb/batting/' + name + ' ' + id + '_batting.csv')

