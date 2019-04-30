function getSalary(){
  var sel = document.getElementById('emp_id');
  var f = document.getElementById('salary');
  var per = document.getElementById('percent');
  var bonus = document.getElementById('salary_rate');
  var lbl = document.getElementById("salaryLabel");
  var selected = sel.options[sel.selectedIndex];
  f.value = selected.getAttribute("data-salary");
  if(sel.selectedIndex == 1 && sel.selectedIndex != 0){
    document.getElementById("bonusDiv").style.display = "none";
    document.getElementById("percentageDiv").style.display = "none";
    allEmployee(f, per, bonus);
  }else if(sel.selectedIndex != 0 && sel.selectedIndex != 1){
    document.getElementById("salaryLabel").style.display = "block";
    document.getElementById("percentageDiv").style.display = "block";
    document.getElementById("bonusDiv").style.display = "block";
    document.getElementById("bonusCategoryDiv").style.display = "none";
    document.getElementById("salaryDiv").style.display = "block";

  var selectedPer = per.options[per.selectedIndex];
  if(selectedPer.getAttribute("value") != ""){
    bonus.value = selectedPer.getAttribute("value") * f.value;
  }

}else{
  refreshAll();
}
}

  function allEmployee(f, per, bonus){
    document.getElementById("salaryDiv").style.display = "none";
    document.getElementById("bonusCategoryDiv").style.display = "inline";

    if (document.getElementById('bonus_category').checked) {
      radios_value = document.getElementById('bonus_category').value;
    }

    per.selectedIndex = 0;
    bonus.value = 0;
  }
  function refreshAll(){
    var f = document.getElementById('salary');
    var per = document.getElementById('percent');
    var bonus = document.getElementById('salary_rate');

    document.getElementById("salaryLabel").style.display = "block";
    document.getElementById("percentageDiv").style.display = "block";
    document.getElementById("bonusDiv").style.display = "block";
    document.getElementById("bonusCategoryDiv").style.display = "none";
    document.getElementById("salaryDiv").style.display = "block";

    per.selectedIndex = 0;
    f.value = "";
    bonus.value = 0;
  }

  $(document).ready(function () {

    $("input[type='radio']").click(function(){
      var radios = document.getElementsByName('bonus_category');


      for (var i = 0, length = radios.length; i < length; i++)
      {
        if (radios[i].checked)
        {
              // do whatever you want with the checked radio
          if(radios[i].value == "percent"){
            document.getElementById("percentageDiv").style.display = "inline";
            document.getElementById("bonusDiv").style.display = "none";
          }else if(radios[i].value == "intValue"){
            document.getElementById("bonusDiv").style.display = "inline";
            document.getElementById("percentageDiv").style.display = "none";
          }else{
            alert('Sometion wrong with radio button');
          }

          // only one radio can be logically checked, don't check the rest
          break;
        }
      }
    });

  });

  function calculateBonus(){
    var salary = document.getElementById('salary');
    var bonus = document.getElementById('salary_rate');
    var per = document.getElementById('percent');
    var selected = per.options[per.selectedIndex];
    if(salary.value != ""){
      bonus.value = selected.getAttribute("value") * salary.value;
    }
  }
