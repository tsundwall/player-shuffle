import json

with open('sample_mlb_last.json') as json_file:
    data2 = json.load(json_file)

with open('sampleTemp_mlb.json') as json_file:
    data = json.load(json_file)

for i in data.keys():
    if i in data2:
        data[i]= data[i] + data2[i]


teams_directory = data

with open("sampleTemp_mlb.json", "w") as outfile:
    json.dump(teams_directory, outfile)