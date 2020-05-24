mymap.setView([9.013776, 38.754616], 5);

var countries = [
  ["neutral_zone_iraq", neutral_zone, "1935_10_03"],

  ["albania", neutral, "1935_10_03"],
  ["andorra", neutral, "1935_10_03"],
  ["argentina", neutral, "1935_10_03"],
  ["austria", neutral, "1935_10_03"],
  ["belgian_congo", neutral, "1935_10_03"],
  ["belgium", neutral, "1935_10_03"],
  ["bhutan", neutral, "1935_10_03"],
  ["bolivia", neutral, "1935_10_03"],
  ["brazil", neutral, "1935_10_03"],
  ["bulgaria", neutral, "1935_10_03"],
  ["chile", neutral, "1935_10_03"],
  ["colombia", neutral, "1935_10_03"],
  ["costarica", neutral, "1935_10_03"],
  ["cuba", neutral, "1935_10_03"],
  ["czechoslovakia", neutral, "1935_10_03"],
  ["danzig", neutral, "1935_10_03"],
  ["denmark", neutral, "1935_10_03"],
  ["dominican_republic", neutral, "1935_10_03"],
  ["dutch_east_indies", neutral, "1935_10_03"],
  ["finland", neutral, "1935_10_03"],
  ["ecuador", neutral, "1935_10_03"],
  ["el_salvador", neutral, "1935_10_03"],
  ["estonia", neutral, "1935_10_03"],
  ["greece", neutral, "1935_10_03"],
  ["guatemala", neutral, "1935_10_03"],
  ["haiti", neutral, "1935_10_03"],
  ["honduras", neutral, "1935_10_03"],
  ["hungary", neutral, "1935_10_03"],
  ["iceland", neutral, "1935_10_03"],
  ["ifni", neutral, "1935_10_03"],
  ["iran", neutral, "1935_10_03"],
  ["iraq", neutral, "1935_10_03"],
  ["ireland", neutral, "1935_10_03"],
  ["latvia", neutral, "1935_10_03"],
  ["liberia", neutral, "1935_10_03"],
  ["lichtenstein", neutral, "1935_10_03"],
  ["lithuania", neutral, "1935_10_03"],
  ["luxembourg", neutral, "1935_10_03"],
  ["macau", neutral, "1935_10_03"],
  ["mexico", neutral, "1935_10_03"],
  ["monaco", neutral, "1935_10_03"],
  ["nepal", neutral, "1935_10_03"],
  ["netherlands", neutral, "1935_10_03"],
  ["nicaragua", neutral, "1935_10_03"],
  ["norway", neutral, "1935_10_03"],
  ["panama", neutral, "1935_10_03"],
  ["paraguay", neutral, "1935_10_03"],
  ["peru", neutral, "1935_10_03"],
  ["philippines", neutral, "1935_10_03"],
  ["poland", neutral, "1935_10_03"],
  ["portugal", neutral, "1935_10_03"],
  ["portuguese_cape_verde", neutral, "1935_10_03"],
  ["portuguese_east_africa", neutral, "1935_10_03"],
  ["portuguese_guinea", neutral, "1935_10_03"],
  ["portuguese_india", neutral, "1935_10_03"],
  ["portuguese_timor", neutral, "1935_10_03"],
  ["portuguese_west_africa", neutral, "1935_10_03"],
  ["romania", neutral, "1935_10_03"],
  ["san_marino", neutral, "1935_10_03"],
  ["sao_tome_and_principe", neutral, "1935_10_03"],
  ["saudi_arabia", neutral, "1935_10_03"],
  ["siam", neutral, "1935_10_03"],
  ["spain", neutral, "1935_10_03"],
  ["spanish_africa", neutral, "1935_10_03"],
  ["spanish_morocco", neutral, "1935_10_03"],
  ["spanish_sahara", neutral, "1935_10_03"],
  ["sweden", neutral, "1935_10_03"],
  ["switzerland", neutral, "1935_10_03"],
  ["tibet", neutral, "1935_10_03"],
  ["turkey", neutral, "1935_10_03"],
  ["uruguay", neutral, "1935_10_03"],
  ["usa", neutral, "1935_10_03"],
  ["vatican", neutral, "1935_10_03"],
  ["venezuela", neutral, "1935_10_03"],
  ["yemen", neutral, "1935_10_03"],
  ["yugoslavia", neutral, "1935_10_03"],

  ["australia", neutral, "1935_10_03"],
  ["bahamas", neutral, "1935_10_03"],
  ["bahrain", neutral, "1935_10_03"],
  ["barbados", neutral, "1935_10_03"],
  ["basutoland", neutral, "1935_10_03"],
  ["bechuanaland", neutral, "1935_10_03"],
  ["bermuda", neutral, "1935_10_03"],
  ["british_burma", neutral, "1935_10_03"],
  ["british_guiana", neutral, "1935_10_03"],
  ["british_honduras", neutral, "1935_10_03"],
  ["british_hong_kong", neutral, "1935_10_03"],
  ["british_leeward_islands", neutral, "1935_10_03"],
  ["british_malaya", neutral, "1935_10_03"],
  ["british_somaliland", neutral, "1935_10_03"],
  ["british_western_pacific_territories", neutral, "1935_10_03"],
  ["british_windward_islands", neutral, "1935_10_03"],
  ["brunei", neutral, "1935_10_03"],
  ["canada", neutral, "1935_10_03"],
  ["ceylon", neutral, "1935_10_03"],
  ["cyprus", neutral, "1935_10_03"],
  ["egypt", neutral, "1935_10_03"],
  ["falklands", neutral, "1935_10_03"],
  ["gambia", neutral, "1935_10_03"],
  ["gibraltar", neutral, "1935_10_03"],
  ["gold_coast", neutral, "1935_10_03"],
  ["india", neutral, "1935_10_03"],
  ["jamaica", neutral, "1935_10_03"],
  ["kenya", neutral, "1935_10_03"],
  ["kingdom_of_sikkim", neutral, "1935_10_03"],
  ["kuwait", neutral, "1935_10_03"],
  ["maldives", neutral, "1935_10_03"],
  ["malta", neutral, "1935_10_03"],
  ["mauritius", neutral, "1935_10_03"],
  ["new_zealand", neutral, "1935_10_03"],
  ["nigeria", neutral, "1935_10_03"],
  ["north_borneo", neutral, "1935_10_03"],
  ["northern_rhodesia", neutral, "1935_10_03"],
  ["nyasaland", neutral, "1935_10_03"],
  ["oman", neutral, "1935_10_03"],
  ["palestine", neutral, "1935_10_03"],
  ["qatar", neutral, "1935_10_03"],
  ["saint_helena", neutral, "1935_10_03"],
  ["sarawak", neutral, "1935_10_03"],
  ["seychelles", neutral, "1935_10_03"],
  ["sierra_leone", neutral, "1935_10_03"],
  ["south_africa", neutral, "1935_10_03"],
  ["southern_rhodesia", neutral, "1935_10_03"],
  ["swaziland", neutral, "1935_10_03"],
  ["transjordania", neutral, "1935_10_03"],
  ["trinidad_and_tobago", neutral, "1935_10_03"],
  ["tristan_de_cunha", neutral, "1935_10_03"],
  ["trucial_states", neutral, "1935_10_03"],
  ["uganda", neutral, "1935_10_03"],
  ["uk", neutral, "1935_10_03"],
  ["zanzibar", neutral, "1935_10_03"],

  ["france", neutral, "1935_10_03"],
  ["french_cameroon", neutral, "1935_10_03"],
  ["french_equatorial_africa", neutral, "1935_10_03"],
  ["french_guiana", neutral, "1935_10_03"],
  ["french_india", neutral, "1935_10_03"],
  ["french_indochina", neutral, "1935_10_03"],
  ["french_madagascar", neutral, "1935_10_03"],
  ["french_oceania", neutral, "1935_10_03"],
  ["french_somaliland", neutral, "1935_10_03"],
  ["french_syria", neutral, "1935_10_03"],
  ["french_togoland", neutral, "1935_10_03"],
  ["french_west_africa", neutral, "1935_10_03"],
  ["guadelupe", neutral, "1935_10_03"],
  ["inini", neutral, "1935_10_03"],
  ["martinique", neutral, "1935_10_03"],
  ["morocco", neutral, "1935_10_03"],
  ["tangiers", neutral, "1935_10_03"],
  ["tunis", neutral, "1935_10_03"],

  ["mongolia", neutral, "1935_10_03"],
  ["tannu_tuva", neutral, "1935_10_03"],
  ["ussr", neutral, "1935_10_03"],

  ["germany", neutral, "1935_10_03"],

  ["east_chahar", axis_occupied, "1935_10_03"],
  ["east_hebei", axis_occupied, "1935_10_03"],
  ["japan", axis, "1935_10_03"],
  ["manchukuo", axis_puppet, "1935_10_03"],

  ["guangdong_clique", neutral, "1935_10_03"],
  ["hebei_clique", neutral, "1935_10_03"],
  ["new_guanxi_clique", neutral, "1935_10_03"],
  ["pailingmiao_council", neutral, "1935_10_03"],
  ["xinjiang", neutral, "1935_10_03"],

  ["chongqing_clique", allies_puppet, "1935_10_03"],
  ["hunan_clique", allies_puppet, "1935_10_03"],
  ["mianyang_clique", allies_puppet, "1935_10_03"],
  ["ningxia_ma_clique", allies_puppet, "1935_10_03"],
  ["northeastern_army", allies_puppet, "1935_10_03"],
  ["northwest_garrison", allies_puppet, "1935_10_03"],
  ["qinghai_ma_clique", allies_puppet, "1935_10_03"],
  ["shandong_clique", allies_puppet, "1935_10_03"],
  ["shanxi_clique", allies_puppet, "1935_10_03"],
  ["sichuan_clique", allies_puppet, "1935_10_03"],
  ["tunganistan", allies_puppet, "1935_10_03"],
  ["xikang_clique", allies_puppet, "1935_10_03"],
  ["yunnan_clique", allies_puppet, "1935_10_03"],
  ["china", allies, "1935_10_03"],

  ["chinese_soviet_republic", comintern, "1935_10_03"],

  ["ethiopia", finland, "1935_10_15"],
  
  ["italy", italy, "1935_10_03"],
  ["italian_ethiopia", italy_occupied, "1935_10_15"],
  ["eritrea", italy_puppet, "1935_10_03"],
  ["libya", italy_puppet, "1935_10_03"],
  ["italian_somalia", italy_puppet, "1935_10_03"]
]