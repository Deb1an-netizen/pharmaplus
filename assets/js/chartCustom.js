
$(document).ready(function() {
    //$("#doc_list").hide();
    
    
    $('#pat_btn').click(function(){
        alert('Data Entered!');
    });
    
    $('#svHunt').DataTable( {
        "ajax":{ 
            "url":'assets/php/superHunt.php',
            "dataSrc" : ""
        },
        "columns" : [
            {"data": "super"},
            {"data": "start_date"},
            {"data": "end_date"},
            {"data": "time"},
            {"data": "name"},
            {"data": "pname"},
            {"data": "quantity"},
        ]
    } );
} );
//SELECT contracts.super,contracts.start_date,contracts.end_date,contracts.name,contracts.pname,SUM(sells.quantity) FROM contracts JOIN sells ON contracts.trade_name = sells.trade_name AND contracts.pname=sells.pname GROUP BY contracts.trade_name;
$(document).ready(function() {
    $('#docHunt').DataTable( {
        "ajax": {
            "url" : 'assets/php/doctorhunt.php',
            "dataSrc" : ""
        },
        "columns" : [
            {"data": "dssn"},
            {"data": "fname"},
            {"data": "mname"},
            {"data": "lname"},
            {"data": "specialty"},
            {"data": "years_xp"},
        ]
    } );
    /*$('#main_btn').click(function(){
        //e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "assets/php/doctorhunt.php",
            data: $('#main_form').serialize(),
            success: function(data){
                alert('Success' + data);
                
            }
        });
    });*/
} );
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1/pharma/assets/php/bar.json",
        success: function(data){
            console.log(data);
            var date = [];
            var quantity = [];

            for(var i in data){
                date.push(data[i].date);
                quantity.push(data[i].quantity);
            }

            var chartdata = {
                labels: date,
                datasets : [
                    {
                        label: 'Quantity',
                        backgoundColor: ['rgba(66,139,202, 0.75)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: 'blue',
                        pointHoverBackgroundColor: 'red',
                        pointHoverBorderColor: 'red',
                        pointHoverRadius: 5,
                        hoverBackgroundColor: 'rgba(200,200,200,1)',
                        data: quantity
                    }
                ]
            };
            var ctx = $('#top5');

            var barGraph = new Chart(ctx,{
                type: 'line',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        position: 'bottom',
                        text: 'Quantity Sold',
                        fontSize: 24,
                        fontColor: '#428bca'
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: 'rgb(255, 99, 132)'
                        }
                    }
                }
            });
        } 
    });
});
