
let grid = [' ',' ',' ',' ',' ',' ',' ',' ',' '];

let divs;

let gameOver = false;

let gameOn = false;

function onDivClick(index) {

      if(!gameOn)
        changeStateToGameOn();

      if(divs === undefined) {
            populateDivs();
      }

      if(!gameOver && grid[index] == ' ') {

        grid[index] = 'X';
        divs[index].textContent = 'X';

        $jsonData = JSON.parse(JSON.stringify(grid));

      $.ajax({
      type : 'POST',
      url : './play/ss.php',
      data : {
          'jsonData' : $jsonData
      },
      datatype : 'json',
      success : function ($response)
      {
        $data = JSON.parse($response);
        if($data.winner != '') {
                  if($data.winner == ' ')
                      document.getElementById("state").textContent = "It's a draw!";
                  else {
                      document.getElementById("state").textContent = "Winner is " + $data.winner + "!";
                  }
                  gameOver = true;
              }
              console.log($data)
              grid = $data.grid;
              for(var i = 0; i < 9; i++) {
                divs[i].textContent = grid[i];
              }
      }, false : function(e) {
            alert('failed');
        }

  });

        // $.post("play/ss.php", {grid}, function(resp) {
        //       //var resp = JSON.parse(response)
        //       if(resp.winner != '') {
        //           if(resp.winner == ' ')
        //               document.getElementById("state").textContent = "It's a draw!";
        //           else {
        //               document.getElementById("state").textContent = "Winner is " + resp.winner + "!";
        //           }
        //           gameOver = true;
        //       }
        //       console.log(resp)
        //       grid = resp.grid;
        //       for(var i = 0; i < 9; i++) {
        //         divs[i].textContent = grid[i];
        //       }
        // });

      }
}

function changeStateToGameOn() {
    document.getElementById("state").textContent = "Game on!";
    gameOn = true;
}

function populateDivs() {
      divs = new Array(9);
      for(var i = 0; i < 9; i++) {

        divs[i] = document.getElementById(i);

      }
}
