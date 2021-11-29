/*

const highscore = document.querySelector('.high-score');
localstorage.setitem("highScore", score.toString());
scoreDisplay.innerHTML = 'High Score: $(score)'

*/






//Canvas Setup
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
canvas.height = 500;
canvas.width = 500;

//Bools for paddle movement
let rightPressed = false;
let leftPressed = false;

//Event Listeners for the keypresses
document.addEventListener("keydown", keyDownHandler);
document.addEventListener("keyup", keyUpHandler);

//Ball speed
let speed = canvas.width / 300;
//Random number generator to make the ball initial position a little more random
let rng = Math.random() * 2;

//Defining Ball with ctx
let ball = {
    x: canvas.width / 2,
    y: canvas.height - 50,
    dx: speed,
    dy: -speed + 1,
    radius: 7,
    draw: function() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, true);
        ctx.fillStyle = "#ffffff";
        ctx.closePath();
        ctx.fill();
    }
}

//Defining paddle with ctx
let paddle = {
    height: 10,
    width: 76,
    x: canvas.width / 2 - 76 / 2,
    dx: canvas.width / 300,
    draw: function() {
        ctx.beginPath();
        ctx.rect(this.x, canvas.height - this.height, this.width, this.height);
        ctx.fillStyle = "#ffffff";
        ctx.closePath();
        ctx.fill();
    }
}

//Input handlers
function keyDownHandler(e) {
    if (e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = true;
    } else if (e.key == 'Left' || e.key == 'ArrowLeft') {
        leftPressed = true;
    }
}

function keyUpHandler(e) {
    if (e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = false;
    } else if (e.key == 'Left' || e.key == 'ArrowLeft') {
        leftPressed = false;
    }
}

//Initializes score variable
let score = 0;

//Draws score in the screen
function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#ffffff";
    ctx.fillText("Score " + score, 8, 20)
}


//Paddle movement function
function movePaddle() {
    if (rightPressed) {
        paddle.x += paddle.dx;
    } else if (leftPressed) {
        paddle.x -= paddle.dx;
    }
}


//Bricks
let brickRowCount = 3;
let brickColumnCount = 5;
let brickWidth = 70;
let brickHeight = 20;
let brickPadding = 20;
let brickOffsetTop = 30;
let brickOffsetLeft = 35;

let bricks = [];

function generateBricks() {
    for (let c = 0; c < brickColumnCount; c++) {
        bricks[c] = [];
        for (let r = 0; r < brickRowCount; r++) {
            bricks[c][r] = { x: 0, y: 0, status: 1 }
        }
    }
}

function drawBricks() {
    for (let c = 0; c < brickColumnCount; c++) {
        for (let r = 0; r < brickRowCount; r++) {
            if (bricks[c][r].status == 1) {
                let brickX = c * (brickWidth + brickPadding) + brickOffsetLeft;
                let brickY = r * (brickHeight + brickPadding) + brickOffsetTop;
                bricks[c][r].x = brickX;
                bricks[c][r].y = brickY;
                ctx.beginPath()
                ctx.rect(brickX, brickY, brickWidth, brickHeight);
                ctx.fillStyle = "#ffff00";
                ctx.fill();
                ctx.closePath();
            }
        }
    }
}

function collision() {
    for (let c = 0; c < brickColumnCount; c++) {
        for (let r = 0; r < brickRowCount; r++) {
            let b = bricks[c][r];
            if (b.status == 1) {
                if (ball.x >= b.x && ball.x <= b.x + brickWidth && ball.y >= b.y && ball.y <= b.y + brickHeight) {
                    ball.dy *= -1;
                    b.status = 0;
                    score++
                }
            }
        }
    }
}

function level() {
    if (score % 15 == 0 && score != 0) {
        if (ball.y > canvas.height / 2) {
            generateBricks();
            ball.dx *= 1.00025;
            ball.dy *= 1.00025;
        }
    }
}


//Play function for runtime
function play() {
    //Making sure there's no trail left by the geometry
    ctx.clearRect(0, 0, canvas.width, canvas.height)

    //Draw functions
    ball.draw();
    paddle.draw();
    movePaddle();
    drawBricks();
    collision();
    level();


    //initial ball position
    ball.x += ball.dx + rng;
    ball.y += ball.dy + rng;

    //Reset Score
    if (ball.y + ball.radius > canvas.height) {
        var data = score;
        document.scoresubmit.data.value = data;
        document.forms["scoresubmit"].submit();
        score = 0
        generateBricks();
        ball.dx = speed;
        ball.dy = -speed + 1;
    }

    //Ball bounds
    if (ball.x + ball.radius > canvas.width || ball.x - ball.radius < 0) {
        ball.dx *= -1;
    }
    if (ball.y + ball.radius > canvas.height || ball.y - ball.radius < 0) {
        ball.dy *= -1;
    }

    //Paddle bounds
    if (paddle.x + paddle.width >= canvas.width) {
        paddle.x = canvas.width - paddle.width;
    }
    if (paddle.x <= 0) {
        paddle.x = 0;
    }

    //Bounce off paddle
    if (ball.x >= paddle.x && ball.x <= paddle.x + paddle.width && ball.y + ball.radius >= canvas.height - paddle.height) {
        ball.dy *= -1;
    }

    drawScore();
    requestAnimationFrame(play);

}

generateBricks();
play();