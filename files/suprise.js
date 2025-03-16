// let noCounter = 0;
// const noMessages = [
//     "I think you meant yes",
//     "Please? I asked so sweetly 🥺",
//     "Maanja na pagli, rulayegi kya",
//     "My heart will toots 😭",
//     "Thank you for breaking my poor heart 😔🙏🏼"
// ];
// let proposalStep = 0;

// function acceptProposal() {
//     let img = document.getElementById("proposal-img");
//     let message = document.getElementById("proposal-question");
//     let yesButton = document.getElementById("yes-button");
//     let noButton = document.getElementById("no-button");

//     if (proposalStep === 0) {
//         img.src = "../images/offering_ring.png";
//         message.innerText = "Can I have your hand, my love?";
//     } else if (proposalStep === 1) {
//         img.src = "../images/putting_ring.png";
//         message.innerText = "Let me put this ring on you ❤️";
//         yesButton.innerText = "YES!!!";
//     } else {
//         img.src = "../images/hand_with_ring.png";
//         message.innerText = "Congratulations, you are now my (un)lawfully lovely wife!";
//         yesButton.classList.add("hidden");
//     }
    
//     proposalStep++;
//     noButton.classList.add("hidden"); // Hide "No" button after accepting
// }

// document.addEventListener("DOMContentLoaded", function () {
//     let noButton = document.getElementById("no-button");
//     let container = document.querySelector(".proposal-container");

//     if (!noButton || !container) {
//         console.error("No button or container found! Check if the IDs match the HTML.");
//         return;
//     }

//     container.style.position = "relative";
//     noButton.style.position = "absolute";
//     noButton.style.left = "50%";
//     noButton.style.top = "50%";
//     noButton.style.transform = "translate(-50%, -50%)";

//     noButton.addEventListener("mouseenter", function () {
//         let containerRect = container.getBoundingClientRect();
//         let buttonRect = noButton.getBoundingClientRect();

//         let maxX = containerRect.width - buttonRect.width;
//         let maxY = containerRect.height - buttonRect.height;

//         let randomX = Math.random() * (maxX - 20) + 10;
//         let randomY = Math.random() * (maxY - 20) + 10;

//         // **Final Jail Bars** - Prevents any chance of escape
//         randomX = Math.max(10, Math.min(randomX, maxX - 10));
//         randomY = Math.max(10, Math.min(randomY, maxY - 10));

//         noButton.style.left = `${randomX}px`;
//         noButton.style.top = `${randomY}px`;

//         console.log(`"No" button jailed at: X=${randomX}, Y=${randomY}`);
//     });
// });






const ringImage = document.getElementById('ring-image');
const message = document.getElementById('message');
const noButton = document.getElementById('no-btn');
const yesButton = document.getElementById('yes-btn');
const container = document.getElementById('proposal-container');
const responses = [
  "i think you meant yes",
  "please? i asked so sweetly 🥺",
  "maanja na pagli, rulayegi kya",
  "my heart will toots",
  "my mental health is deteriorating rn",
  "fine, i will cry forever 😔"
];
let hoverCount = 0;
let yesClickCount = 0;

function handleYes() {
  yesClickCount++;

  if (yesClickCount === 1) {
    ringImage.src = "../images/offering_ring.png";
    message.innerText = "Can I have your hand, my love?";
  } else if (yesClickCount === 2) {
    ringImage.src = "../images/putting_ring_on.png";
    message.innerText = "Let me put this ring on you ❤️";
    yesButton.innerText = "YES ✨";
  } else if (yesClickCount === 3) {
    ringImage.src = "../images/married.png";
    message.innerText = "Congratulations, you are now my (un)lawfully and lovely wife 💍";
    noButton.style.display = 'none';
    yesButton.style.display = 'none';
  }
}

function handleNoHover() {
  const containerRect = container.getBoundingClientRect();
  const maxX = containerRect.width - noButton.offsetWidth;
  const maxY = containerRect.height - noButton.offsetHeight;

  const randomX = Math.max(0, Math.min(Math.random() * maxX, maxX));
  const randomY = Math.max(0, Math.min(Math.random() * maxY, maxY));

  noButton.style.left = `${randomX}px`;
  noButton.style.top = `${randomY}px`;

  message.innerText = responses[Math.min(hoverCount, responses.length - 1)];

  hoverCount++;

  if (hoverCount > 5) {
    ringImage.src = "../images/broken-heart.png";
    message.innerText = "thank you for breaking my poor heart 😔🙏🏼";
    noButton.style.transform = `rotate(${Math.random() * 360}deg)`;
    noButton.style.transition = '0.5s ease';
    setTimeout(() => { noButton.style.transform = 'rotate(0deg)'; }, 500);
  }
}