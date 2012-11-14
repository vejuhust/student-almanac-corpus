#!/usr/bin/env python
# -*- coding: utf-8 -*-

from weibo import APIClient
import webbrowser
import unicodedata
import codecs

APP_KEY = '**APP_KEY**'
APP_SECRET = '**APP_SECRET**'
CALLBACK_URL = 'http://www.baidu.com'

#利用官方微博SDK
client = APIClient(app_key=APP_KEY, app_secret=APP_SECRET, redirect_uri=CALLBACK_URL)

#得到授权页面的url，利用webbrowser打开这个url
url = client.get_authorize_url()
print url
webbrowser.open_new(url)

#获取code=后面的内容
print '输入url中code后面的内容后按回车键：'
code = raw_input()

r = client.request_access_token(code)
access_token = r.access_token
expires_in = r.expires_in

# 设置得到的access_token
client.set_access_token(access_token, expires_in)

# 打开文件
f = codecs.open('result.txt', 'w')
f.write(codecs.BOM_UTF8)

# 获取并分析目标全部内容
page_index = 1
while True :
    r = client.get.statuses__user_timeline(uid=1763978027, count=100, page=page_index)
    page_index += 1
    if len(r.statuses) == 0:
        break
    for st in r.statuses:
        st_code = st.text.encode('utf8')
        if (st_code.find(u"#青年老黄历#".encode('utf8')) >= 0):
            st_code = st_code[st_code.find(u"宜".encode('utf8')):]
            st_set = st_code.split(u"，".encode('utf8'))
            for st_one in st_set:
                st_set_sub = st_one.split(u"。".encode('utf8'))
                for phrase in st_set_sub:
                    phrase = phrase[3:]
                    if (len(phrase) > 0):
                        f.write(phrase + u"\n".encode('utf8'))

# 关闭文件
f.close()


