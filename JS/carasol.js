/*
// Manual hovering below code 
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("project5-images");
    //let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}
*/
function plusSlides(prevnext, project_image) {
  //alert(project_image);
  var n = document.getElementsByClassName(project_image);
  console.log("prevnext:" + prevnext);
  console.log("No of images: " + n.length);
  console.log("style :" + document.getElementsByClassName(project_image)[0].style.display);
  //var present_image_class=null
  for (var i = 0; i < n.length; i++) {
    //alert("project Images lenght: " + n.length);
    if (document.getElementsByClassName(project_image)[i].style.display == 'block') {
      console.log("i of image where style is none :" + document.getElementsByClassName(project_image)[i].id);
      var text = document.getElementsByClassName(project_image)[i].id;
      var words = text.split('-');
      x = words[3];

      console.log("image No:" + words[3]);
      console.log("i is: " + i);
      if (prevnext > 0) {
        console.log("Clicked right arrow");
        if (x == (1 + i)) {
          console.log("In the IF Statement");
          console.log("i+1 is: " + (i + 1));
          console.log("i+2 is: " + (i + 2));
          if (x == n.length) {
            document.getElementsByClassName(project_image + "-image" + x)[0].style.display = 'none';
            document.getElementsByClassName(project_image + "-text" + x)[0].style.display = 'none';
            document.getElementsByClassName(project_image + "-image1")[0].style.display = 'block';
            document.getElementsByClassName(project_image + "-text1")[0].style.display = 'block';
            console.log("if(x==n.length)");
          }
          else {
            console.log("else(x==n.length)");
            console.log(project_image + "-image" + (i + 1));
            console.log(project_image + "-text" + (i + 1));
            document.getElementsByClassName(project_image + "-image" + (i + 1))[0].style.display = 'none';
            document.getElementsByClassName(project_image + "-text" + (i + 1))[0].style.display = 'none';
            console.log(project_image + "-image" + (i + 2));
            console.log(project_image + "-text" + (i + 2));
            document.getElementsByClassName(project_image + "-image" + (i + 2))[0].style.display = 'block';
            document.getElementsByClassName(project_image + "-text" + (i + 2))[0].style.display = 'block';
            
            /*
            document.getElementsByClassName("project3-images-image1")[0].style.display = 'none';
            document.getElementsByClassName("project3-images-text1")[0].style.display = 'none';
            document.getElementsByClassName("project3-images-image2")[0].style.display = 'block';
            document.getElementsByClassName("project3-images-text2")[0].style.display = 'block';
            */
            
            

          }
          return;
        }
      }
      else {
        console.log("showing prev image");


        console.log("In the IF Statement");
        console.log("i-1 is: " + (i - 1));
        console.log("i-2 is: " + (i - 2));

        if (x == 1) {
          alert("You are viewing first image of project. click next");
          /*document.getElementsByClassName("project5-images-image1")[0].style.display='none';
          document.getElementsByClassName("project5-images-text1")[0].style.display='none';
          document.getElementsByClassName("project5-images-image"+n.length)[0].style.display='block';
          document.getElementsByClassName("project5-images-text"+n.length)[0].style.display='block';
          */
        }
        else {
          document.getElementsByClassName(project_image + "-image" + (x))[0].style.display = 'none';
          document.getElementsByClassName(project_image + "-text" + (x))[0].style.display = 'none';
          document.getElementsByClassName(project_image + "-image" + (x - 1))[0].style.display = 'block';
          document.getElementsByClassName(project_image + "-text" + (x - 1))[0].style.display = 'block';
        }
        return;

      }

      //
      // var x=str
    }
    /*
    if(prevnext>0){
        console.log("Showing next image");
        if(i==0){
            document.getElementsByClassName("project5-images-image1")[0].style.display='none';
            document.getElementsByClassName("project5-images-text1")[0].style.display='none';
            document.getElementsByClassName("project5-images-image"+(i+1+prevnext))[0].style.display='block';
            document.getElementsByClassName("project5-images-text"+(i+1+prevnext))[0].style.display='block';
        } else {
            if(i==n-1){
                console.log("resetting to first image");
                document.getElementsByClassName("project5-images-image"+(n))[0].style.display='none';
                document.getElementsByClassName("project5-images-text"+(n))[0].style.display='none';
                document.getElementsByClassName("project5-images-image1")[0].style.display='block';
                document.getElementsByClassName("project5-images-text1")[0].style.display='block';
            } 
            else {
                console.log("i : "+i)
                alert("show 2");
                document.getElementsByClassName("project5-images-image"+(1+i))[0].style.display='none';
                document.getElementsByClassName("project5-images-text"+(i+1))[0].style.display='none';
                document.getElementsByClassName("project5-images-image1"+(i+2))[0].style.display='block';
                document.getElementsByClassName("project5-images-text1"+(i+2))[0].style.display='block';
            }
        }
    }   
    return; 
    console.log("i:"+i);
    document.getElementsByClassName("project5-images-image"+(i+prevnext))=block;
    document.getElementsByClassName("project5-images-text"+(i+prevnext))=block;
    console.log("Display property of element:"+ n[i].style.display );
    if((prenext+i)==n.length){
        document.getElementsByClassName("project5-images-image"+i)=block;
    }
    /*
    if(n[i].style.display=='none'){
       console.log("Display property of element:"+n.style.display);
       console.log("i:"+i);
    }
    */



  }


}