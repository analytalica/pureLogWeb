function setActiveParent1() {
  aObj = document.getElementById('parentMenu').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) { 
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='parentActive';
    }
  }
}
function setActiveChild1() {
  aObj = document.getElementById('childMenu').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) { 
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='childActive';
    }
  }
}
window.onload = function () {
    setActiveParent1();
	setActiveChild1();
}
//Original js code written by Rob Glazebrook.
//http://www.cssnewbie.com/intelligent-navigation/