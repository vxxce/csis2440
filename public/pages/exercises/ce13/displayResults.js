// DOM element constants
const fetchToggle = document.querySelector('#fetchToggle')
const button = document.querySelector('button')
const display = document.querySelector('#results')
const num = document.querySelector('#num')


  /////////////////////////////////////////////////////
 //                                XMLHttpRequest   //
//                                                 //
const getEmXML = () => {                    //
  const url = `results.php?num=${num.value}`     //
  let req = new XMLHttpRequest()                //
  req.onreadystatechange = () => {             //
    if (req.readyState == 4) {                //
      display.innerHTML = req.responseText   //
    }                                       //
  }                                        //
  req.open("GET", url)                    //
  req.send()                             // 
}                                       //
/////////////////////////////////////////


  ////////////////////////////////////////////////////
 //                                        FETCH   //
//                                                //
const getEmFetch = async () => {                 //
  const url = `results.php?num=${num.value}`    //
  req = await fetch(url)                       //
  res = await req.text()                      //
  display.innerHTML = res                    //
}                                           //
/////////////////////////////////////////////



// attach listeners
let fetching = false
let url = ""
button.addEventListener('click', getEmXML, false)
fetchToggle.addEventListener('click', () => {
  button.removeEventListener( 'click'
                            , fetching
                              ? getEmFetch
                              : getEmXML
                            , false
  )
  button.addEventListener( 'click'
                           , fetching
                              ? getEmXML
                              : getEmFetch
                          , false
  )

  fetching = !fetching
  fetchToggle.checked = fetching
  button.textContent = fetching ? "fetch!" : "XMLHttpRequest!"
})
num.addEventListener('input', e => url = e.target.value)