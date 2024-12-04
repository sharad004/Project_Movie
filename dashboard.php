<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
  
   
    <div id="header">
        <div class="top-header">
            <div class="top-header-left">
                <div>CinemaHerr</div>
                <div>
                    <select  id="Location">
                    <option value="Kathmandu">Kathmandu</option>
                    <option value="Pokhara">Pokhara</option>
                    <option value="Bhaktapur">Bhaktapur</option>
                    <option value="Lalitpur">Lalitpur</option>
                    <option value="Birgunj">Birgunj</option>
                    <option value="Biratnagar">Biratnagar</option>
                    <option value="Nepalgunj">Nepalgunj</option>
                    <option value="Butwal">Butwal</option>
                    </select>
                </div> 
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                <a href="logout.php">Logout</a>
                </div>   
               
            </div>
        </div>

        <div class="image-container">
            <img class="imageanim" src="moana2.jpg" alt="A descriptive text">
        </div>
        
        

    </div>
   
    <!-- Movie selection option -->

    <div id="display" class="movie-list z-index-5"></div> 
    <div class="movie-container z-index-5">
        <label>Select a movie</label>
        <select id="movie">
            <option value="" id="">Please select a movie</option>
            <option value="450" id="Despicable">Despicable Me 3 (Rs.450)</option>
            <option value="500" id="Kung">Kung Fu Panda 4 (Rs.500)</option>
            <option value="400" id="IF">IF (Rs.400)</option>
        </select>
    </div>
 
     <div class="topp">
    <div style="display: flex;gap: 50px;padding-bottom: 30px; margin-bottom:0px">
        <div>
            <div class="seat-def"></div>
            <small>Available seats</small>
        </div>
        <div>
            <div class="seat-def selected1"></div>
            <small>Selected seats</small>
        </div>
        <div>
            <div class="seat sold"></div>
            <small>Sold seats</small>
        </div>
</div>

    </div>

    <!-- Main container for seat layout -->

    <div class="container ">
        <div style="display: flex;justify-content: center;">Movie Screen</div>
        <div class="screen"></div>

        <!-- Rows of seats -->
         <div class="pukar">
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat1">
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
            
            
        </div>
        

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat sold"></div>
            <div class="seat sold"></div>
            <div class="seat1">
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
            
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat1">
            <div class="seat sold"></div>
            <div class="seat sold"></div>
        </div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat1">
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat sold"></div>
            <div class="seat sold"></div>
            <div class="seat"></div>
            <div class="seat1">
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
            
        </div>
    </div>
    </div>


    <!-- Display selected seats and total cost -->
    <p class="text z-index-5">
        You have selected <span id="count">0</span> seats for the price of Rs. <span id="total">0</span>.
    </p>

    <!-- JavaScript -->
    <script>//yo chai api fetch garya ho hai
        
      

        let movie = document.getElementById('movie');
        let totalPrice = 0;
        let seatCount = 0;

        // Select count and total elements
        let count = document.querySelector("#count");
        let total = document.querySelector("#total");

        // Get all seats
        const seats = document.querySelectorAll(".seat:not(.sold)");

        // Add click event to each seat
        seats.forEach((seat) => {
            seat.addEventListener("click", function () {
                bookSeat(seat);
            });
        });

        // Function to book/unbook a seat
        function bookSeat(seat) {
            // Check if a movie is selected
            if (!movie.value) {
                alert("You must select a movie before booking seats!");
                return;
            }

            // Toggle seat selection
            if (seat.classList.contains("selected")) {
                seat.classList.remove("selected");
                totalPrice -= parseInt(movie.value || 0);
                seatCount -= 1;
            } else {
                seat.classList.add("selected");
                totalPrice += parseInt(movie.value || 0);
                seatCount += 1;
            }
            updateDisplay();
        }

        // Function to reset seat selection
        function resetSeats() {
            seats.forEach((seat) => {
                seat.classList.remove("selected");
            });
        }

        // Function to update the display
        function updateDisplay() {
            count.innerText = seatCount;
            total.innerText = totalPrice;
        }

        // Add change event for the movie selection
        movie.addEventListener('change', () => {
            // Reset count and price
            totalPrice = 0;
            seatCount = 0;
            updateDisplay();

            // Reset all selected seats
            resetSeats();
        });
    </script>



</body>
</html>
