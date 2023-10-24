import {effectsList} from "./effectsConfig.js";
import {importedEffectsList} from "./import/effectsList.js";
import {
  applyEffect,
  applyEffectParam,
  clearEffect,
  getScreenshot,
  startAnalysis,
  startGame,
  startPlayer,
  stopAnalysis,
} from "./BanubaPlayer.js"

const webcamSourceButton = document.querySelector('#webcam')
const effectsBlock = document.querySelector('.effects-list')
const effectControlBlock = document.querySelector('.effect-control')
const handGesturesBlock = document.querySelector('.hand-gestures')
const heartRateBlock = document.querySelector('.heart-rate')
const testRulerBlock = document.querySelector('.test-ruler')

let menuScene = document.getElementById('menu-scene')
let webcamScene = document.getElementById('webcam-scene')
let mainBody = document.getElementById('main-body')
let screenshotBtn = document.getElementById('screen-shot')

let fondo1 = document.getElementById('fondo-1');
let fondo2 = document.getElementById('fondo-2');
let marco = document.getElementById('marco');

let selectedEffect
let controlBlock
let controlFunc
let curEventType

const setEffectParam = async (params, value, arg) => {
  for (const param of params) {
    const s = arg ? `${param}({${arg}:${value}})` : `${param}(${value})`
    await applyEffectParam(s)
  }
}

const addEffectControlHandler = (control) => {

  curEventType = control

  switch (control) {
    case 'slider':
      const min = selectedEffect.minValue !== undefined ? selectedEffect.minValue : -10
      effectControlBlock.innerHTML = `
        <div class="effect-control__slider-container">
          <input type="range" min="${min}" max="10" value="0" class="effect-control__slider">
        </div>`
      controlBlock = document.querySelector('.effect-control__slider')
      const value = (0 - min) / (10 - min) * 100
      controlBlock.style.background = 'linear-gradient(to right, #4794FE 0%, #4794FE ' + value + '%, #EEF2F7 ' + value + '%, #EEF2F7 100%)'
      controlFunc = async (e) => {
        const value = (e.target.value - e.target.min) / (e.target.max - e.target.min) * 100
        document.querySelector('.effect-control__slider').style.background = 'linear-gradient(to right, #4794FE 0%, #4794FE ' + value + '%, #EEF2F7 ' + value + '%, #EEF2F7 100%)'
        await setEffectParam(selectedEffect.params, e.target.value * selectedEffect.direction / 10, selectedEffect?.arg)
      }
      controlBlock.addEventListener('input', controlFunc)
      break

    case 'toggle':
      effectControlBlock.innerHTML = '<input type="checkbox" name="toggle" class="effect-control__toggle" checked>'
      controlBlock = document.querySelector('.effect-control__toggle')
      controlFunc = async (e) => {
        await setEffectParam(selectedEffect.params, e.target.checked ? 1 : 0)
      }
      controlBlock.addEventListener('change', controlFunc)
      break

    case 'analise':
      if (selectedEffect.name === 'Detection_gestures.zip') {
        // handGesturesTipBlock.classList.remove('hidden')
        controlBlock = handGesturesBlock
      } else if (selectedEffect.name === 'heart_rate.zip') {
        heartRateBlock.classList.remove('hidden')
        controlBlock = heartRateBlock
      } else if (selectedEffect.name === 'test_Ruler.zip') {
        testRulerBlock.classList.remove('hidden')
        controlBlock = testRulerBlock
      }
      controlFunc = startAnalysis(selectedEffect.name, selectedEffect.params[0], controlBlock)
      break

    case 'game':
      controlFunc = startGame
      controlBlock = document.querySelector('#webar')
      controlBlock.addEventListener('click', controlFunc)
      break

    default:
      controlBlock = null
      controlFunc = null
      curEventType = null
  }
}

const startEffect = (effect = 'Background_change_1.zip') => {
  selectedEffect = effect
  const effectPath = 'assets/effects/'
  applyEffect(effectPath + selectedEffect)
    .then(() => addEffectControlHandler(selectedEffect?.control))
} 
 
const onWebcamSelect = (e) => {
  startPlayer()
  startEffect()

  webcamScene.setAttribute("class", "webcam-scene")
  menuScene.setAttribute("class", "hidden")
  mainBody.style.background = "url('./assets/images/back2.jpg') no-repeat"
  mainBody.style.backgroundSize = "cover"
};

enablePlay()

// Me ejecuto cuando todo acaba de cargar;
function enablePlay (){
  webcamSourceButton.style.opacity = "1";
  webcamSourceButton.style.pointerEvents = "all";
}

async function takeScreenshot (){
  let canva = document.getElementsByTagName("canvas")[0];
  let url = canva.toDataURL('image/png');

  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');
  const originalImage = new Image();
  originalImage.src = url;

  const logo2 = new Image();
  logo2.src = (selectedEffect === "Background_change_1.zip") ? "assets/images/marco1.png" : "assets/images/marco2.png";

  Promise.all([
    new Promise((resolve) => originalImage.onload = resolve),
    new Promise((resolve) => logo2.onload = resolve)
    ]).then(() => {
      const logo2Width = originalImage.width;
      const logo2Height = 300;

      canvas.width = originalImage.width;
      canvas.height = originalImage.height;
      ctx.drawImage(originalImage, 0, 0);

      const logo2X = 0;
      const logo2Y = canvas.height - logo2Height;
      ctx.drawImage(logo2, logo2X, logo2Y, logo2Width, logo2Height);

      const imageWithLogo = new Image();
      imageWithLogo.src = canvas.toDataURL();
      /* ***** */
      // Decodificar la imagen Base64
      const imageData = imageWithLogo.src.split(',')[1];
      const decodedImageData = atob(imageData);
      // Convertir la imagen decodificada en un arreglo de bytes
      const byteCharacters = decodedImageData.split('').map(char => char.charCodeAt(0));
      const byteArray = new Uint8Array(byteCharacters);
      // Crear un objeto Blob a partir del arreglo de bytes
      const blob = new Blob([byteArray], { type: 'image/png' }); // Ajusta el tipo MIME según el formato de la imagen
      // Crear un objeto FormData y agregar el blob
      const formData = new FormData();
      formData.append('image', blob, 'image.png'); // El último parámetro es el nombre del archivo
      /* ***** */
      Livewire.emit('savePhotoListener', imageWithLogo.src)
    });
}

webcamSourceButton.addEventListener('click', onWebcamSelect)
screenshotBtn.addEventListener('click', takeScreenshot); 

fondo1.addEventListener('click', () => {
  startEffect('Background_change_1.zip');
  marco.src="assets/images/marco1.png"
});

fondo2.addEventListener('click', () => {
  startEffect('Background_change_2.zip');
  marco.src="assets/images/marco2.png"
});