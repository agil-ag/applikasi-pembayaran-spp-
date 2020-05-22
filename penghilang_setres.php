<!DOCTYPE html>
<html>
   <head>
      <title>Math Mini Game</title>
      <link rel="stylesheet" type="text/css" href="mathgame/bootstrap/css/bootstrap.css">
      <script type="text/javascript" src="mathgame/jquery-3.3.1.min.js"></script>
      <script src="mathgame/script.js" charset="utf-8"></script>
   </head>
   <body>
      <div id="head">
         <div class="container">
            <div class="head-title">
               <h3 class="page-header mt-4">Math Game</h3>
               <p>Please input form below and press <b>play</b> button to play the game.</p>
            </div>
            <div class="head-component mt-5">
               <form id="form" onsubmit="return false" method="post">
                  <div class="form-row">
                     <div class="form-group col-md-3">
                        <label for="username">Username</label>
                        <input type="text" required autocomplete="off" name="username" id="username" class="form-control">
                     </div>
                     <div class="form-group col-md-3">
                        <label for="level">Level</label>
                        <select id="level" required class="form-control">
                           <option value="">--Select Level--</option>
                           <option value="1">Easy</option>
                           <option value="2">Normal</option>
                           <option value="3">Hard</option>
                        </select>
                     </div>
                  </div>
                  <input type="submit" id="play" class="btn btn-danger" value="Play Game">
            </div>
         </div>
         </form>
      </div>
      <div id="body" class="mt-5">
         <div class="container">
            <div class="row">
               <div class="col-md-6 pr-5">
                  <div class="body-title">
                     <h4 id="usernamectn"></h4>
                     <div class="sub-title score-time" hidden>Point: <span class="game-time text-success"><b id="point"></b></span> | <span id="score-time"></span></div>
                  </div>
                  <div class="body-game mt-3 bg-secondary px-3 py-3 text-light" hidden>
                     <span>The Quiz</span>
                     <div class="game-quiz">
                        <h2>
                           <span class="number-1"> </span>
                           <span class="quiz-type"> <b id="operation"></b> </span>
                           <span class="number-2"> </span>
                           <span class="additional"></span>
                        </h2>
                     </div>
                     <div class="game-control mt-3">
                        <form class="form-vertical" onsubmit="return false" id="submitanswer">
                           <input autofocus class="answer form-control col-4 float-left" type="number" name="answer" placeholder="Your answer">
                           <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="card col-md-6 pl-5 py-3 history" hidden>
                  <h4>History</h4>
                  <ul class="history-math">
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>