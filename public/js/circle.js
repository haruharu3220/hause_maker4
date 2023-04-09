window.onload = function () {
    let canvas = document.querySelector("#sushi_circle");
    let context = canvas.getContext('2d');
    
    // DBからtagのそれぞれの数を取得
    let totalTags = parseInt(canvas.getAttribute('data-total-tags'));
    let undecidedTags = parseInt(canvas.getAttribute('data-undecided-tags'));
    let consideringTags = parseInt(canvas.getAttribute('data-considering-tags'));
    let decidedTags = parseInt(canvas.getAttribute('data-decided-tags'));
    
    // ステータスごとの割合を計算
    let undecidedPercentage = (undecidedTags / totalTags) * 100;
    let consideringPercentage = (consideringTags / totalTags) * 100;
    let decidedPercentage = (decidedTags / totalTags) * 100;
    
    new Chart(context, {
        type: 'doughnut',
        data: {
            labels: ["未決定", "検討中", "決定"],
            datasets: [{
                backgroundColor: ["#fecaca", "#bfdbfe", "#99f6e4"],
                data: [undecidedPercentage, consideringPercentage, decidedPercentage]
            }]
        },
        options: {
            responsive: false,
        }
    });
}
