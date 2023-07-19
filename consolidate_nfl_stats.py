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


chrome_options = Options()
chrome_options.page_load_strategy = 'eager'
chrome_options.add_experimental_option('excludeSwitches', ['enable-logging'])
chrome_options.add_extension('C:\\Users\\Tanner\\Documents\\grid\\Adblock.crx')
chrome_options.headless = False
driverPath = "chromedriver.exe"
driver = webdriver.Chrome(options = chrome_options,executable_path=driverPath)
driver.get("https://www.pro-football-reference.com/")
time.sleep(15)
ct = 0
for _,_,name,year,link,_,_,_ in tqdm.tqdm(df[23152:].itertuples(),total=df[23152:].shape[0]):
    err_count = 0
    id=link.split('/')[-1].split('.')[0]
    tbl_passing = None
    tbl_rushing_receiving = None
    tbl_receiving_rushing = None
    tbl_defense = None
    tbl_kicking = None
    driver.get(link)
    try:
        tbl_passing = pd.read_html(driver.find_element(By.ID,"all_passing").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        err_count += 1

    try:
        tbl_rushing_receiving = pd.read_html(driver.find_element(By.ID,"all_rushing_and_receiving").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        err_count += 1
   
    try:
        tbl_rushing_receiving.columns = tbl_rushing_receiving.columns.map('_'.join)
    except:
        pass

    try:
        tbl_receiving_rushing = pd.read_html(driver.find_element(By.ID,"all_receiving_and_rushing").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        err_count += 1

    try:
        tbl_receiving_rushing.columns = tbl_receiving_rushing.columns.map('_'.join)
    except:
        pass

    try:
        tbl_defense = pd.read_html(driver.find_element(By.ID,"all_defense").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        err_count += 1   

    try:
        tbl_defense.columns = tbl_defense.columns.map('_'.join)
    except:
        pass

    try:
        tbl_kicking = pd.read_html(driver.find_element(By.ID,"all_kicking").find_elements(By.TAG_NAME,'table')[0].get_attribute('outerHTML'))[0]
    except:
        err_count += 1  

    try:
        tbl_kicking.columns = tbl_kicking.columns.map('_'.join)
    except:
        pass

    if err_count == 5:
        print(link)

    
    if tbl_passing is not None:
        tbl_passing.to_csv('stats_nfl/passing/' + name + ' ' + id + '_passing.csv')
    if tbl_rushing_receiving is not None:
        tbl_rushing_receiving.to_csv('stats_nfl/rushing/' + name + ' ' + id + '_rushing.csv')
    if tbl_receiving_rushing is not None:
        tbl_receiving_rushing.to_csv('stats_nfl/receiving/' + name + ' ' + id + '_receiving.csv')
    if tbl_defense is not None:
        tbl_defense.to_csv('stats_nfl/defense/' + name + ' ' + id + '_defense.csv')
    if tbl_kicking is not None:
        tbl_kicking.to_csv('stats_nfl/kicking/' + name + ' ' + id + '_kicking.csv')

