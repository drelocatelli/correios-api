from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import os

# Configurações 
options = Options()
options.headless = True # não mostra navegador
browser = webdriver.Chrome(executable_path="./browser/chromedriver", options=options)
options = browser.maximize_window()

# search
def search(what):
    try:
        browser.get('https://www2.correios.com.br/sistemas/rastreamento/default.cfm')
        input = browser.find_element_by_css_selector('textarea[name="objetos"]')
        input.send_keys(what)
        btn = browser.find_element_by_css_selector('#btnPesq').click()
        print('Aguarde...')
        os.system('sleep 5')
        response = browser.find_element_by_xpath('//*[@id="UltimoEvento"]/strong')
        print(response.text)
        os.system('echo %s > log' %(response.text))
    except Exception:
        print('Ocorreu um erro!')

# Application Starts
request = input('Código de rastreio: ')
search(request)

# browser.quit()
