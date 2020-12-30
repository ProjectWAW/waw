<script>
(function(){
  function id(v) {
    return document.getElementById(v);
  }
  function loadbar() {
    var ovrl = id("overlay"),
    prog = id("progress"),
    stat = id("progstat"),
    img = document.images,
    c = 0,
    tot = img.length;
    if (tot == 0) return doneLoading();
    function imgLoaded() {
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      prog.style.width = perc;
      stat.innerHTML = "Loading: "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading() {
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg = new Image();
      tImg.onload = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src = img[i].src;
    }    
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());
</script>
<style>
#overlay{
  position: fixed;
  z-index: 99999;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(0,0,0,0.9);
  transition: 1s 0.4s;
}
#progress-container {
  height: 13px;
  border: 1px solid #fff;
  top: 50%;
  left: 5%;
  right: 5%;
  position: absolute;
}
#progress{
  height: 11px;
  background: #fff;
  width: 0;
  transition: 1s;
}
#progstat{
  font-size: 2em;
  position: absolute;
  top: 50%;
  margin-top: -45px;
  width: 100%;
  text-align: center;
  color: #fff;
}
#fun-fact{
  font-size: 1.5em;
  position: absolute;
  top: 50%;
  left: 8%;
  right: 8%;
  margin-top: 25px;
  text-align: center;
  color: #fff;
}
</style>
<div id="overlay">
  <div id="progstat">Loading: 0%</div>
  <div id="progress-container"><div id="progress"></div></div>
  <div id="fun-fact"></div>
  <script>
    var facts = Array(
      "The country with the largest number of WWII causalities was the Soviet Union, with over 21 million.",
      "For every five German soldiers who died in WWII, four of them died on the Eastern Front.",
      "It is estimated that 1.5 million children died during the Holocaust. Approximately 1.2 million of them were Jewish and tens of thousands were Gypsies.",
      "Eighty percent of Soviet males born in 1923 didn’t survive WWII.",
      "Between 1939 and 1945, the Allies dropped 3.4 million tons of bombs, which averaged to 27,700 tons per month.",
      "Even after the Allies arrived, many concentration camp prisoners were beyond help. In Bergen-Belsen, for example, 13,000 prisoners died after liberation. Nearly 2,500 of the 33,000 survivors of Dachau died within six weeks of liberation.",
      "Most historians agree that WWII began when Germany invaded Poland on September 1, 1939. Others say it started when Japan invaded Manchuria on September 18, 1931. And some scholars suggest WWII is actually a continuation of WWI, with a break in between.",
      "Max Heiliger was the fictitious name the SS used to establish a bank account in which they deposited money, gold, and jewels taken from European Jews.",
      "The longest battle of WWII was the Battle of the Atlantic, which lasted from 1939-1945.",
      "The original abbreviation of the National Socialist Party was Nasos. The word “Nazi” derives from a Bavarian word that means “simple minded” and was first used as a term of derision by journalist Konrad Heiden (1901-1966).",
      "Approximately 600,000 Jews served in the United States armed forces during WWII. More than 35,000 were killed, wounded, captured, or missing. Approximately 8,000 died in combat. However, only two Jewish soldiers were awarded the Medal of Honor in WWII.",
      "The Battle of the Bulge is the largest and deadliest battle for U.S. troops to date, with more than 80,000 American casualties.",
      "More Soviets (military and civilians) lost their lives during the Siege of Leningrad than American and British soldiers combined did in all of WWII."
      "The swastika is an ancient religious symbol. It derives from the Sanskrit name for a hooked cross, which was used by ancient civilizations as a symbol of fertility and good fortune. It has been found in Greek, Egyptian, Chinese, and Indian ruins, as well as Hindu temples.",
      "Many historians believe that the Battle at Stalingrad (1942-1943) was not only arguably the bloodiest battle in history (800,000-1,600,000 casualties), but also the turning point of WWII in Europe.",
      "WWII ended on September 2, 1945, when Japan signed a surrender agreement on the USS Missouri in Tokyo Bay.",
      "From 1940-1945, the U.S. defense budget increased from $1.9 billion to $59.8 billion.",
      "During WWII, hamburgers in the U.S. were dubbed “Liberty Steaks” to avoid the German-sounding name.",
      "The ace of all fighter aces of all nations is German fighter pilot Erich Hartmann (“the Blond Knight”) with 352 “kills.”",
      "William Hitler, a nephew of Adolf Hitler, was in the U.S. Navy during WWII. He changed his name after the war.",
      "Out of the 40,000 men who served on U-boats during WWII, only 10,000 returned.",
      "The greatest tank battle in history occurred between the Germans and Soviets at the Kursk salient in Russia from July 4-22, 1943. More than 3,600 tanks were involved.",
      "Germany had a total of 3,363 generals during the war while the U.S. had just over 1,500.",
      "Prisoners of war in Soviet camps experienced an 85% mortality rate.",
      "WWII was the most destructive conflict in history. It cost more money, damaged more property, killed more people, and caused more far-reaching changes than any other war in history.",
      "On July 14, 1941, the Soviets introduced a new weapon, the Katyusha, which could fire 320 rockets in 25 seconds. More than 50 years later, the Katyusha remains an effective weapon",
      "Hitler designed the Nazi flag. Red stood for the social idea of Nazism, white for nationalism, and the black swastika for the struggle of the Aryan man.",
      "The most important medical advance that saved soldiers’ lives during WWII was the blood transfusion.",
      "WWII casualties totaled between 50 and 70 million people. More than 80% of this total came from four countries: Russia, China, Germany, and Poland. More than half of these casualties were civilians, most of whom were women and children.",
      "Japan and Russia never formally ended hostilities after WWII. Plans for them to sign an official peace treaty in 2000 failed because Japan wanted Russia to return four offshore islands it had taken after the war.",
      "In the 1928 elections, less than 3% of Germans voted for the Nazi party. In 1938, Hitler was Time magazine’s man of the year.",
      "The Germans used the first jet fighters in World War II, among them the Messerschmitt ME-262. However, they were developed too late to change the course of the war."
    );
    var fact = facts[Math.floor(Math.random() * facts.length)];
    document.getElementById("fun-fact").innerHTML = "Did you know? "+fact;
    setInterval(function() {
      var fact = facts[Math.floor(Math.random() * facts.length)];
      document.getElementById("fun-fact").innerHTML = "Did you know? "+fact;
    }, 14000);
  </script>
</div>
<img>
