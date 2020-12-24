function cal(){
    let ft = parseInt(document.bmi.ft.value);
    let inch = parseInt(document.bmi.inch.value);
    let lbs = parseInt(document.bmi.lbs.value);
    feet = ft * 12;
    inches = feet + inch;
    meter = inches * 0.0254;
    msquare = meter * meter;
    kg = lbs * 0.4535923700;
    ans = kg / msquare;
    answer = Number((ans).toFixed(1));
    document.bmi.result.value = answer;

    var tit = document.getElementById('tit');
    var fans = document.getElementById('fans');
    tit.style.display = "none";
    fans.style.display = "block";
    
    if (answer < 18.5){
        document.getElementById('fans').innerHTML = "<h1>You are <font color='skyblue'>Underweight!</font></h1>";
    }else if (18.4 < answer && answer < 25){
        document.getElementById('fans').innerHTML = "<h1>You are <font color='green'>Normal Weight.</font></h1>";
    }
    else if (24.9 < answer && answer < 30){
        document.getElementById('fans').innerHTML = "<h1>You are <font color='red'>Overweight!</font></h1>";
    }else{
        document.getElementById('fans').innerHTML = "<h1><font color='orange'>Obesity!</font></h1>";
    }
}