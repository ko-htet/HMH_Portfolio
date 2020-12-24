window.onload = start;
function start(){
    var sin_btn = document.getElementById('sin');
    sin_btn.onclick = function(){
        var married = document.getElementById('married');
        var single = document.getElementById('single');
        married.style.display = "none";
        single.style.display = "block";
    };
    var mar_btn = document.getElementById('mar');
    mar_btn.onclick = function(){
        var married = document.getElementById('married');
        var single = document.getElementById('single');
        married.style.display = "block";
        single.style.display = "none";
    };
}
function cal(){
    let a = document.getElementById("m_sly").value;
    document.getElementById("s_month").innerHTML = a + ".00";
    let ys = a * 12;
    document.getElementById("s_year").innerHTML = ys + ".00";
    document.getElementById("i_year").innerHTML = ys + ".00";
    let person = ys * 0.2;
    document.getElementById("per").innerHTML = "-" + person + ".00";
    let cb = document.querySelectorAll('input[name="parent"]:checked');
    let par = cb.length * 1000000;
    document.getElementById("pr").innerHTML = "-" + par + ".00";
    var c = document.querySelectorAll('input[name="spouse"]:checked');
    var cr = c.length * 1000000;
    document.getElementById("sr").innerHTML = "-" + cr + ".00";
    let child = document.getElementById("children").value;
    let chi = child * 500000;
    document.getElementById("cr").innerHTML = "-" + chi + ".00";
    let d = document.getElementById("ded").value;
    document.getElementById("od").innerHTML = "-" + d + ".00";
    let tai = ys - person - par - cr - chi - d;
    document.getElementById("ti").innerHTML = tai + ".00";
    
    if(tai < 2000001){
        document.getElementById("zero").innerHTML = tai + ".00";
    }
    if(tai > 2000000 && tai < 5000001){
        document.getElementById("zero").innerHTML = "2000000.00";
        z = tai - 2000000;
        document.getElementById("f").innerHTML = z + ".00";
        z = z * 0.05;
        document.getElementById("fp").innerHTML = z + ".00";
        document.getElementById("res").innerHTML = "<b>" + z + ".00</b>";
        document.getElementById("tt").innerHTML = "<b>" + z + ".00</b>";
        mot = z / 12;
        mot = Number((mot).toFixed(2));
        document.getElementById("mt").innerHTML = "<b>" + mot + "</b>";
    }
    if (tai > 5000000 && tai < 10000001){
        document.getElementById("zero").innerHTML = "2000000.00";
        y = 3000000 * 0.05;
        document.getElementById("f").innerHTML = "3000000.00";
        document.getElementById("fp").innerHTML = y + ".00";
        x = tai - 5000000;
        document.getElementById("t").innerHTML = x + ".00";
        x = x * 0.1;
        document.getElementById("tp").innerHTML = x + ".00";
        r = x + y;
        document.getElementById("res").innerHTML = "<b>" + r + ".00</b>";
        document.getElementById("tt").innerHTML = "<b>" + r + ".00</b>";
        mot = r / 12;
        mot = Number((mot).toFixed(2));
        document.getElementById("mt").innerHTML = "<b>" + mot + "</b>";
    }

    var mpage = document.getElementById('mpage');
    var cpage = document.getElementById('cpage');
    mpage.style.display = "none";
    cpage.style.display = "block";
}
function ok(){
    var mpage = document.getElementById('mpage');
    var cpage = document.getElementById('cpage');
    mpage.style.display = "block";
    cpage.style.display = "none";
}