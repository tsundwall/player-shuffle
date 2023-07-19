
import json
import random
from convert_score import convert_score
import stats_key_mlb
import pandas as pd

teams = ['ARI','ATL','BAL','BOS','CHC','CHW','CIN','CLE','COL','DET','HOU','KCR','LAA','LAD','MIA','MIL','MIN','NYM','NYY','OAK','PHI','PIT','SDP','SFG','SEA','STL','TBR','TEX','TOR','WSN'];

aliases = {
    'TBR':['TBD'],
    'WAS':['MON'],
    'LAA':['ANA'],
    'SFG':['NYG'],
    'MIA':['FLA']
}

row = []
col = []

def findMatches(tm1,tm2,dict):
    sol = []
    temp = []
    for i in dict[tm2]:
        temp.append(i[0])
    if tm2 in aliases:
        for alias in aliases[tm2]:
            for i in dict[alias]:
                temp.append(i[0])
    max_score = 0
    max_name = ""
    max_img_path = ""
    for player,year,score,img_addr in dict[tm1]:
        end_year = int(year.split('-')[1])
        first_year = int(year.split('-')[0])

        if player in temp:
            sol.append([player,year,score,img_addr])
            if score != "" and float(score) > 0:
                if convert_score(float(score),2023,first_year,end_year) > max_score:
                    max_score = convert_score(float(score),2022,first_year,end_year)
                    max_name = player
                    max_img_path = img_addr
    if tm1 in aliases:
        for alias in aliases[tm1]:
            for player,year,score,img_addr in dict[alias]:
                end_year = int(year.split('-')[1])
                if player in temp:
                    sol.append([player,year,score,img_addr])
                    if score != "" and float(score) > 0:
                        if convert_score(float(score),2023,first_year,end_year) > max_score: 
                            max_score = convert_score(float(score),2022,first_year,end_year)
                            max_name = player
                            max_img_path = img_addr

    return sol,[str(int(max_score)),max_name,max_img_path]

df_key = pd.read_csv('players_mlb.csv')

with open('sampleTemp_mlb.json') as json_file:
    data = json.load(json_file) 

row_turn = True
for shuffle in range(6):
     
    not_found = True
    while not_found:
        curr = random.randint(0,29) 
        if teams[curr] not in row and teams[curr] not in col:
            not_found = False
            if row_turn:
                row.append(teams[curr])
            else:
                col.append(teams[curr])
    
    row_turn = not row_turn

stat_row = False
if random.random() < 0.65:
    stats_dic = stats_key_mlb.mapping
    row[2] = list(stats_dic.keys())[random.randint(0,17)]
    stat_row = True
    print(row[2])


key = []
scores = []

r_ct = 0
for r in row:
    for c in col:
        if r_ct == 2 and stat_row:
            max_score = 0
            max_name = ""
            max_img_path = ""
            lst = []
            names = stats_key_mlb.query(c,r)
            ret = []
            for i in names:
                # key_str = i[0].split(' ')[-1].split('_')[0]
                name_stripped = ' '.join(i.split(" ")[:-1])
                for j in data[c]:
                    if j[0] == name_stripped:
                        lst.append(j)
                        if j[2] != '':
                            if float(j[2]) > max_score:
                                max_score = float(j[2])
                                max_name = j[0]
                                max_img_path = j[3]

            score = [str(max_score),max_name,max_img_path]
        else:
            lst, score = findMatches(r,c,data)
        key.append(lst)
        scores.append(score)
    r_ct += 1

out = col + row

with open('teams_mlb.txt', 'w') as f:
    for line in out:
        f.write(line)
        f.write('\n')

with open('scores_mlb.txt', 'w') as f:
    n = len(scores)
    ct = 0
    for item in scores:
        for line in item:
            f.write(line)
            f.write(';')
        ct += 1
        if ct != n:
            f.write('\n')
        

for i in range(9):
    with open('key'+str(i)+'_mlb.txt', 'w') as f:
        ct_out = 0
        n = len(key[i])
        for item in key[i]:
            ct = 0
            for line in item:
                if ct == 2:
                    if line != '':
                        f.write(str(int(convert_score(int(line),2023,int(item[1].split('-')[0]),int(item[1].split('-')[1])))))
                    # else:
                    #     f.write(str(int(convert_score(int(0),2023,int(item[1].split('-')[0]),int(item[1].split('-')[1])))))
                else:
                    f.write(line)
                f.write(';')
                ct+=1
            ct_out+=1
            if ct_out != n:
                f.write('\n')