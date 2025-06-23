const url = 'https://docs.google.com/spreadsheets/d/1c93QqLqAiJcZDRWIY3BErzkvDrknxx8uqBcBujBZGDc/gviz/tq?'
const clientName = document.querySelector('.client-name')
const clientComment = document.querySelector('.client-comment')
const carousel = document.getElementById('Comment')

fetch(url)
    .then(response => response.text())
    .then(data => {
        const temp = data.substring(47).slice(0, -2);
        const json = JSON.parse(temp);
        console.log(json.table.rows)
        const rows = json.table.rows;
        // rows.forEach((row) => {
        //     console.log( row)
            // for(i = 0; i < rows.length; i++){
                // console.log(carousel[i]);
                carousel.innerHTML +=  `
                <div class="carousel-item active">
                    <div class="img mt-5">
                        <img src="../../storage/${rows[0].c[3].v}" alt="" width="100" height="100" style="border-radius:50%">
                    </div>
                    <div class="clien-name mt-5">
                        <h4 class="client-name" style="color: #818181; font-size:18px;"><b>${rows[0].c[5].v}</b></h4>
                    </div>
                    <div class="rating">
                        <p>* * * * *</p>
                    </div>
                    <div class="comment-content" style="padding-bottom:30px;">
                        <p class="client-comment ps-5 pe-5" style="font-size:14px;">${rows[0].c[4].v}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img mt-5">
                        <img src="../../storage/${rows[1].c[3].v}" alt="" width="100" height="100" style="border-radius:50%">
                    </div>
                    <div class="clien-name mt-5">
                        <h4 class="client-name" style="color: #818181; font-size:18px;"><b>${rows[6].c[5].v}</b></h4>
                    </div>
                    <div class="rating">
                        <p>* * * * *</p>
                    </div>
                    <div class="comment-content" style="padding-bottom:30px;">
                        <p class="client-comment ps-5 pe-5" style="font-size:14px;">${rows[6].c[4].v}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img mt-5">
                        <img src="../../storage/${rows[2].c[3].v}" alt="" width="100" height="100" style="border-radius:50%">
                    </div>
                    <div class="clien-name mt-5">
                        <h4 class="client-name" style="color: #818181; font-size:18px;"><b>${rows[7].c[5].v}</b></h4>
                    </div>
                    <div class="rating">
                        <p>* * * * *</p>
                    </div>
                    <div class="comment-content" style="padding-bottom:30px;">
                        <p class="client-comment ps-5 pe-5" style="font-size:14px;">${rows[7].c[4].v}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img mt-5">
                        <img src="../../storage/${rows[3].c[3].v}" alt="" width="100" height="100" style="border-radius:50%">
                    </div>
                    <div class="clien-name mt-5">
                        <h4 class="client-name" style="color: #818181; font-size:18px;"><b>${rows[3].c[5].v}</b></h4>
                    </div>
                    <div class="rating">
                        <p>* * * * *</p>
                    </div>
                    <div class="comment-content" style="padding-bottom:30px;">
                        <p class="client-comment ps-5 pe-5" style="font-size:14px;">${rows[3].c[4].v}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img mt-5">
                        <img src="../../storage/${rows[4].c[3].v}" alt="" width="100" height="100" style="border-radius:50%">
                    </div>
                    <div class="clien-name mt-5">
                        <h4 class="client-name" style="color: #818181; font-size:18px;"><b>${rows[4].c[5].v}</b></h4>
                    </div>
                    <div class="rating">
                        <p>* * * * *</p>
                    </div>
                    <div class="comment-content" style="padding-bottom:30px;">
                        <p class="client-comment ps-5 pe-5" style="font-size:14px;">${rows[4].c[4].v}</p>
                    </div>
                </div>
                `
            // }
        // })
    })