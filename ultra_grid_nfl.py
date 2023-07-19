import json
from convert_score import convert_score
from collections import defaultdict

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
        # print(first_year)
        # print(end_year)
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

with open('sampleCollege.json') as json_file:
    data = json.load(json_file) 

aliases = {
    'LAR':['STL'],
    'LAC':['SDG'],
    'LVR':['OAK'],
}

teams = ['MIA', 'CHI', 'DET', 'GNB','TEN', 'CLE', 'IND', 'LVR', 'CAR', 'MIN', 'DEN', 'ARI', 'KAN', 'CIN', 'NWE', 'TAM','PIT', 'PHI', 'NYJ', 'LAR', 'HOU', 'LAC', 'SEA', 'ATL', 'SFO', 'BAL','DAL', 'BUF', 'WAS', 'JAX','NOR','NYG']
teams.sort()

results_dict = defaultdict()

for x,r in enumerate(teams):
    print(x)
    for y,c in enumerate(teams):
        if x < y:
            lst,_ = findMatches(r,c,data)
            results_dict[str(x)+','+str(y)] = [item[0] for item in lst]

with open("ultra_key.json", "w") as outfile:
    json.dump(results_dict, outfile)

