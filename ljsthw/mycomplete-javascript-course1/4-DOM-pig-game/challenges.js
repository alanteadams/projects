/* YOUR 3 CHALLENGES
Change the game to follow these rules:

1. A player looses his ENTIRE score when he rolls two 6 in a row. After that, it's the next player's
turn. (Hint: Always save the previous dice roll in a separate variable)
2. Add an input field to the HTML where players can set the winning score, so that they can change the
predefined score of 100. (Hint: you can read that value with the .value property in Javascript. This is a
good opportunity to use google to figure this out. :)
3. Add another dice to the game, so that there are two dices now. The player looses his current score
when one of them is a 1. (Hint: you will need CSS to position the second dice, so take a look at the CSS
code for the first one.)
*/

var scores, roundScore, activePlayer, gamePlaying;

init();


var lastDice;

document.querySelector('.btn-roll').addEventListener('click', function() {
  console.log("Shh I did a good job of listening to button roll.")
//    if (i = 0; i < lastScore.length; i++)
    if(gamePlaying) {
  // 1. Random Number
  var dice1 = Math.floor(Math.random() * 6) + 1;
  var dice2 = Math.floor(Math.random() * 6) + 1;



  //2. Display the result
  document.getElementById('dice-1').style.display = 'block';
  document.getElementById('dice-2').style.display = 'block';
  document.getElementById('dice-1').src = 'dice-' + dice1 + '.png';
  document.getElementById('dice-2').src = 'dice-' + dice2 + '.png';


  //3. Update the round score IF the rolled number was NOT a 1
  if (dice1 !== 1 && dice2 !== 1) {
    // Add Score
    roundScore += dice1 + dice2;
    document.querySelector('#current-' + activePlayer).textContent = roundScore;

  } else {
    document.querySelector('#score-' + activePlayer).textContent = '0'
    //Next player
    nextPlayer();
  }
  /*

    if (dice === 6 && lastDice === 6) {
      // Player Losses score.
      scores[activePlayer] = 0;
      document.querySelector('#score-' + activePlayer).textContent = '0';
      nextPlayer();

    } else if (dice !== 1) {
    // Add Score
    roundScore += dice;
    document.querySelector('#current-' + activePlayer).textContent = roundScore;

  } else {
    //Next player
    nextPlayer();
  }

    lastDice = dice;
    console.log(lastDice)
    */
  };
});


    document.querySelector('.btn-hold').addEventListener('click', function() {
    console.log("Oh snap someone press the function I was listening for which it .btn-hold")
    if(gamePlaying) {

  // Add CURRENT score to GLOBAL score
    scores[activePlayer] += roundScore;

  // Update the UI
  document.querySelector('#score-' + activePlayer).textContent = scores[activePlayer];

    var input = document.querySelector('.final-score').value;
    var winningScore;

    // Undefined, 0, null or "" are COERCED to false
    // Anything else is COERCED to true
    if(input) {
        winningScore = input;

    } else {
          winningScore = 100;
    }


  // Check if player won the game
  if (scores[activePlayer] >= winningScore) {
    console.log("I am the score checker i a player won.")
    document.querySelector('#name-' + activePlayer).textContent = 'You Win';
    document.getElementById('dice-1').style.display = 'none';
    document.getElementById('dice-2').style.display = 'none';
    document.querySelector('.player-' + activePlayer + '-panel').classList.add('winner')
    document.querySelector('.player-' + activePlayer + '-panel').classList.remove('active')
    gamePlaying = false;
  }
  else {
    //Next player
    nextPlayer();
  }
}
});

function nextPlayer() {
  console.log("Hey I am nextPlayer()")
  // Next Player
  activePlayer === 0 ? activePlayer = 1 : activePlayer = 0;
  roundScore = 0;

  document.getElementById('current-0').textContent = '0';
  document.getElementById('current-1').textContent = '0';

  document.querySelector('.player-0-panel').classList.toggle('active');
  document.querySelector('.player-1-panel').classList.toggle('active');

  document.querySelector('.dice').style.display = 'none';
}

document.querySelector('.btn-new').addEventListener('click', init);

function init() {
  console.log("Hey I am init()")
  scores = [0, 0];
  activePlayer = 0;
  roundScore = 0;
  gamePlaying = true;

  document.getElementById('dice-1').style.display = 'none';
  document.getElementById('dice-2').style.display = 'none';

  document.getElementById('score-0').textContent = '0';
  document.getElementById('score-1').textContent = '0';
  document.getElementById('current-0').textContent = '0';
  document.getElementById('current-1').textContent = '0';
  document.getElementById('name-0').textContent = 'Player 1';
  document.getElementById('name-1').textContent = 'Player 2';
  document.querySelector('.player-0-panel').classList.remove('winner');
  document.querySelector('.player-1-panel').classList.remove('winner');
  document.querySelector('.player-0-panel').classList.remove('active');
  document.querySelector('.player-1-panel').classList.remove('active');
  document.querySelector('.player-0-panel').classList.add('active');

}
// document.querySelector('#current-' + activePlayer).innerHTML = '<em>' + dice + '</em>'
// var x = document.querySelector('#score-0').textContent;

/* YOUR 3 CHALLENGES
Change the game to follow these rules:

1. A player looses his ENTIRE score when he rolls two 6 in a row. After that, it's the next player's
turn. (Hint: Always save the previous dice roll in a separate variable)
2. Add an input field to the HTML where players can set the winning score, so that they can change the
predefined score of 100. (Hint: you can read that value with the .value property in Javascript. This is a
good opportunity to use google to figure this out. :)
3. Add another dice to the game, so that there are two dices now. The player looses his current score
when one of them is a 1. (Hint: you will need CSS to position the second dice, so take a look at the CSS
code for the first one.)
*/