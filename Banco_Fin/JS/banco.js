function CalcularMortgage(e) { //obetener los valores o recuperar informacion
    e.preventDefault(); 
    let cuota = document.forms["Form"]["fcuota"].value; 
    let costototal = document.forms["Form"]["fvtotal"].value;
    let interes = document.forms["Form"]["finteres"].value;
    let plazo = document.forms["Form"]["fplazo"].value;

    const MONTHS_ON_YEAR = 12;

    const Mortgage = { 
        costoInmueble :0,
        PrestamoTotal: 0,
        TotalIntereses: 0,
        CuotaMensual: 0
    };

    Mortgage.PrestamoTotal = costototal - cuota;
    Mortgage.TotalIntereses = Mortgage.PrestamoTotal * interes / 100;
    Mortgage.CuotaMensual = (Mortgage.PrestamoTotal + Mortgage.TotalIntereses) / (plazo * MONTHS_ON_YEAR);
    Mortgage.costoInmueble = costototal;

    ouputMortgage(Mortgage); 

}

function ouputMortgage(FinalMortgage) {
    document.getElementById("montoprestamo").innerHTML = ValueDollar(FinalMortgage.PrestamoTotal);
    document.getElementById("CuotaMensual").innerHTML = ValueDollar(FinalMortgage.CuotaMensual);
    var totalPrestamooPorcentaje=0;
    totalPrestamooPorcentaje = FinalMortgage.PrestamoTotal * 100 / FinalMortgage.costoInmueble;
    alert(totalPrestamooPorcentaje);
    if(totalPrestamooPorcentaje > 90){
        document.getElementById("montoprestamo").className += " AlertProcentaje";
    }else{
        document.getElementById("montoprestamo").className = "form-control";
    }
}

function reseltFrom(){
    document.forms["Form"].reset();
    document.forms["Answer"].reset();
}



function ValueDollar(value){//value es el valor con el ue vamos a trabajar
    const dollarFormar = Intl.NumberFormat('en-US',{style: 'currency', currency: 'USD', minimumFractionDigits:2});
    //instanciar un objeto
    return dollarFormar.format(value);
}