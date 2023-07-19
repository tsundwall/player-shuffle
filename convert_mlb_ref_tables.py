
import os
import pandas as pd
import tqdm


arr = ['receiving','rushing','passing','kicking','defense']
for each in arr:
    df_master = pd.DataFrame()
    print(each)
    files = os.listdir('stats_nfl/' + each)
    for file in tqdm.tqdm(files,total=len(files)):
        df_temp = pd.read_csv('stats_nfl/' + each + '/' + file)
        df_temp['Name']=file
        if df_master.empty:
            df_master = df_temp
        else:
            df_master = pd.concat([df_master,df_temp])
    new_cols = []
    for col in df_master.columns:
        col_temp = col
        if 'Unnamed' in col:
            col_temp = col.split('_')[-1]
        new_cols.append(col_temp)
    df_master.columns = new_cols

    df_master.to_csv('MASTER_' + each.upper() + '.csv')
