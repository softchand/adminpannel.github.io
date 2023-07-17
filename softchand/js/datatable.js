async function getData() {
    const records = await fetch('https://dummyjson.com/users');
    const data = await records.json();

    let tab='';
    data.users.forEach(function(users) {
        tab += `<tr>
            <td>${users.firstName} </td>
            <td>${users.lastName} </td>
            <td>${users.age} </td>
            <td>${users.gender} </td>
            <td>${users.email} </td>
        </tr>`
    });
    document.getElementById('tbody').innerHTML = tab;
debugger;
    $('#userTable').DataTable({
        "data" : data.users,
        "columns": [
            {"data": 'firstName'},
            {"data": 'lastName'},
            {"data": 'age'},
            {"data": 'gender'},
            {"data": 'email'}
        ]
        
    });
    const table = new DataTable('#userTable');
 
// Create chart
const chart = Highcharts.chart('demo-output', {
    chart: {
        type: 'pie',
        styledMode: true
    },
    title: {
        text: 'Staff Count Per '
    },
    series: [
        {
            data: chartData(table)
        }
    ]
});

// On each draw, update the data in the chart
table.on('draw', function () {
    chart.series[2].setData(chartData(table));
});
 
function chartData(table) {
    var counts = {};
 
    // Count the number of entries for each position
    table
        .column(2, { search: 'applied' })
        .data()
        .each(function (val) {
            if (counts[val]) {
                counts[val] += 1;
            }
            else {
                counts[val] = 1;
            }
        });
 
    return Object.entries(counts).map((e) => ({
        name: e[0],
        y: e[1]
    }));
}
}