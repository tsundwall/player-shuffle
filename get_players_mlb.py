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

tbl = pd.DataFrame(columns=['name', 'link', 'years'])

chrome_options = Options()
chrome_options.add_experimental_option('excludeSwitches', ['enable-logging'])
chrome_options.headless = False
driverPath = "chromedriver.exe"
driver = webdriver.Chrome(options = chrome_options,executable_path=driverPath)

def getElements(driver, method, string, WAIT):


    if method == "id" or method == "name":

        try:
            elementsObj = DriverWait(driver, WAIT).until(Presence((method, string)))

        except:
            return None

    else:

        try:
            elementsObj = DriverWait(driver, WAIT).until(Presences((method, string)))

        except:
            return None

    return elementsObj


urlSearchBase = "https://www.baseball-reference.com/players/"

df_names = pd.DataFrame(columns={'name','years','link'})


for letter in ascii_lowercase:
    urlSearch = urlSearchBase + letter
    driver.get(urlSearch)
    players = getElements(driver,By.ID,"all_players_",2).find_elements(By.TAG_NAME,'p')

    for player in players:
        
        player_str = player.text
        player_name, player_years = [player_str.split(" (")[0],player_str.split(" (")[1].split(")")[0]]
        player_url = player.find_elements(By.TAG_NAME,'a')[0].get_attribute('href')
        df_names.loc[len(df_names.index)] = [player_name,player_years,player_url]
df_names.to_csv('players_mlb.csv')
