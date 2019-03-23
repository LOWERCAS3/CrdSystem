<?php include_once 'header.php';?>
<main>
  <script>
    function populate(s1,s2){
      var s1 = document.getElementById(s1);
      var s2 = document.getElementById(s2);
      s2.innerHTML = "";
      s2.value = "Select";
      if(s1.value == "Belagavi"){
        var optionArray = ["|Select","Bagalkot|Bagalkot","Belagavi|Belagavi","Vijayapura|Vijayapura","Dharwad|Dharwad","Gadag|Gadag","Haveri|Haveri","Uttara Kannada|Uttara Kannada"];
      } else if(s1.value == "Bengaluru"){
        var optionArray = ["|Select","Bengaluru Urban|Bengaluru Urban","Bengaluru Rural|Bengaluru Rural","Ramanagara|Ramanagara","Chikkaballapur|Chikkaballapur","Chitradurga|Chitradurga","Davanagere|Davanagere","Kolar|Kolar","Shivamogga|Shivamogga","Tumakuru|Tumakuru"];
      } else if(s1.value == "Kalaburagi"){
        var optionArray = ["|Select","Ballari|Ballari","Bidar|Bidar","Kalaburagi|Kalaburagi","Koppal|Koppal","Raichur|Raichur","Yadgir|Yadgir",];
      } else if(s1.value == "Mysuru"){
        var optionArray = ["|Select","Chamarajanagar|Chamarajanagar","Chikkamagaluru|Chikkamagaluru","Dakshina Kannada|Dakshina Kannada","Hassan|Hassan","Kodagu|Kodagu","Mandya|Mandya","Mysuru|Mysuru","Udupi|Udupi",];
      }
      for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
      }
    }
  </script>
  <form class="" action="../includes/fir.inc.php" method="post">
      Name: <input type="text" required name="Victim" placeholder="Full Name"><br>
      FIR Date: <input type="date" required name="FIR_Date"><br>
      FIR Time: <input type="time" required name="Fir_Time" ><br>
      Region:<select style="color: black;" id="slct1" required name="slct1" onchange="populate(this.id,'slct2')">
              <option value="">Select</option>
              <option value="Belagavi">Belagavi</option>
              <option value="Bengaluru">Bengaluru</option>
              <option value="Kalaburagi">Kalaburagi</option>
              <option value="Mysuru">Mysuru</option></select><br><br>
      Area:<select style="color: black;" id="slct2" required name="slct2"></select><br>
      Suspects: <input type="text" name="suspect" placeholder="Add names here"><br>
      Description: <textarea  type="text" name="dscrptn" placeholder="Fill here.."  ></textarea><br><br>
      <button type="submit" name="fir_submit">Submit</button>
    </form>
  </main>
