<?php 
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/ContentModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/Background1Model.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/Background2Model.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/HeaderModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/TitleModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/BeginYourExperienceModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/GetinModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/FooterModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/model/ConfigModel.php";
  require "/xampp/htdocs/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/include/connectdb.php";

  $content = new ContentModel();
  $content->getDataYDOD($conn);

  $bg1 = new Background1();
  $bg1->getDataBg($conn);

  $bg2 = new Background2();
  $bg2->getDataBg2($conn);

  $header = new HeaderModel();
  $header->getDataHeader($conn);

  $title = new TitleModel();
  $title->getDataTitle($conn);

  $byeModel = new BeginYourExperienceModel();
  $byeModel->getDataBye($conn);

  $getinModel = new GetinModel();
  $getinModel->getDataGetin($conn);

  $footerModel = new FooterModel();
  $footerModel->getDataFooter($conn);

  $configModel = new ConfigModel();
  $configModel->getDataConfig($conn);

  if(isset($_SESSION["data_title"])) {
    $data = $_SESSION["data_title"];
    $r = mysqli_fetch_array($data);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      if(isset($_SESSION["data_config"])) {
        $data = $_SESSION["data_config"];
        while($row = mysqli_fetch_array($data)) {
          $title = $row["title"];
          $desc = $row["description"];
          $keyword = $row["keyword"];
          echo <<<EOD
                  <meta name="description" content="$desc">
                  <meta name="keywords" content="$keyword">
                  <title>$title</title>    
              EOD;
        }
      }
    ?>
    <!-- <meta name="description" content="Mô tả ngắn gọn về nội dung trang web">
    <meta name="keywords" content="từ_khóa1, từ_khóa2, từ_khóa3">
    <title>Document</title> -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
<div class="homepage-1920">
  <div class="frame-11654">
    <?php include("include/header.php") ?>
<!--  -->
    <div class="frame-11651">
      <section class="por-25-image-cta-cards-1920">
        <div class="frame-11650">
          <h2 class="begin-your-experience"><?php echo $r["title2"] ?></h2>
          <div class="spacer"></div>
          <div class="frame-11649">
            <?php 
              if(isset($_SESSION["data_ydod"])) {
                $data = $_SESSION["data_ydod"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $title = $row["title"];
                    echo <<<EOD
                      <div
                        class="link-tile"
                        style="
                          background: url('../-ONEXTxTrain---Trainee-Trinh-c/uploads/$image_url') center;
                          background-size: cover;
                          background-repeat: no-repeat;
                        "
                      >
                        <div class="link-tile-bottom-compact">
                          <div class="spacer"></div>
                          <div class="vertical-wrapper">
                            <div class="spacer"></div>
                            <div class="content-wrapper">
                              <h1 class="headline">$title</h1>
                              <div class="link">
                                <div class="arrow-right">
                                  <svg
                                    class="arrow-open-full-right4"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                  >
                                    <path
                                      d="M14.5189 5.5L19.9964 11.9966L19.9995 11.9992L19.999 11.9997L20 12.0008L19.9937 12.0061L14.5184 18.5L13.7499 17.8582L18.2677 12.5L4.00004 12.5L4.00004 11.5L18.2681 11.5L13.7504 6.14175L14.5189 5.5Z"
                                      fill="#FBFCFF"
                                    />
                                  </svg>
                                </div>
                              </div>
                            </div>
                            <div class="spacer"></div>
                          </div>
                          <div class="spacer"></div>
                        </div>
                      </div>
                    EOD;
                }
            } 
            ?>
            
          </div>
        </div>
      </section>
      <section class="por-26-3-experience-levels-v-2">
      <?php if(isset($_SESSION["data_bg1"]))
                    $data = $_SESSION["data_bg1"];
                    while($row = mysqli_fetch_array($data)) {
                      $img = $row["image_url"];
                      echo <<<EOD
                                  <img
                                    class="por-26-3-experience-levels-hover-state"
                                    src="../-ONEXTxTrain---Trainee-Trinh-c/uploads/$img"
                                    alt="Image"
                                  />
                      EOD;
                      ;
                    }
      ?>
      </section>
      <section class="por-39-dark-carousel">
        <div class="spacer"></div>
        <div class="frame-11668">
          <div class="carousel">
            <div class="header">
              <div class="headline2">
                <h2 class="some-heading"><?php echo $r["title3"] ?></h2>
                <div class="spacer"></div>
              </div>
              <div class="nav2">
                <div class="tiny-button">
                  <div class="wrapper">
                    <div class="arrow-left prev1">
                      <svg
                        class="arrow-open-full-left2"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9.48104 18.5L4.00355 12.0034L4.00045 12.0008L4.00091 12.0003L3.99998 11.9992L4.00627 11.9939L9.48151 5.50001L10.25 6.14175L5.73226 11.5L19.9999 11.5L19.9999 12.5L5.7318 12.5L10.2495 17.8583L9.48104 18.5Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="tiny-button">
                  <div class="wrapper">
                    <div class="arrow-right next1">
                      <svg
                        class="arrow-open-full-right5"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M14.5189 5.5L19.9964 11.9966L19.9995 11.9992L19.999 11.9997L20 12.0008L19.9937 12.0061L14.5184 18.5L13.7499 17.8582L18.2677 12.5L4.00004 12.5L4.00004 11.5L18.2681 11.5L13.7504 6.14175L14.5189 5.5Z"
                          fill="white"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="spacer2"></div>
          <!--  -->
          <div class="carousel-container">
            <div class="inner-carousel">
              <div class="track">
                <?php 
                  if(isset($_SESSION["data_bye"])) {
                    $data = $_SESSION["data_bye"];
                    while($row = mysqli_fetch_array($data)) {
                      $title = $row["title"];
                      $subtitle = $row["subtitle"];
                      $content = $row["content"];
                      $image_url = $row["image_url"];
                      echo <<<EOD
                                  <div class="card-container">
                                    <div class="nd">
                                      <div>
                                        <div class="vergleichen-sie-unse">$title</div> 
                                        <div class="vergleichen-sie-unse2">$subtitle</div>
                                      </div>
                                      <div>
                                        <div class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt">
                                          $content
                                        </div>
                                        <div class="button-group">
                                          <div class="button">
                                            <div class="some-label">Read More</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <img src="../-ONEXTxTrain---Trainee-Trinh-c/uploads/$image_url" alt="Image">
                                    </div>
                                  </div>
                      EOD;
                    }
                  }
                ?>
              </div>
            </div>
          </div> 
            <div class="carousel2">
                <div style="text-align:center; z-index: 1;">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
          </div>
          </div>
          <div class="spacer2"></div>  
          <div class="spacer2"></div>
        </section>
      </div>
      <section class="frame-116672">
        <div class="spacer"></div>
        <div class="frame-11668">
          <div class="carousel">
            <div class="header">
              <div class="headline2">
                <h2 class="some-heading2">
                  <?php echo $r["title4"] ?>
                </h2>
                <div class="spacer"></div>
              </div>
              <div class="nav2">
                <div class="tiny-button">
                  <div class="wrapper">
                    <div class="arrow-left prev2">
                      <svg
                        class="arrow-open-full-left3"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9.48104 19L4.00355 12.5034L4.00045 12.5008L4.00091 12.5003L3.99998 12.4992L4.00627 12.4939L9.48151 6.00001L10.25 6.64175L5.73226 12L19.9999 12L19.9999 13L5.7318 13L10.2495 18.3583L9.48104 19Z"
                          fill="#FBFCFF"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="tiny-button">
                  <div class="wrapper">
                    <div class="arrow-right next2">
                      <svg
                        class="arrow-open-full-right6"
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M14.5189 6L19.9964 12.4966L19.9995 12.4992L19.999 12.4997L20 12.5008L19.9937 12.5061L14.5184 19L13.7499 18.3582L18.2677 13L4.00004 13L4.00004 12L18.2681 12L13.7504 6.64175L14.5189 6Z"
                          fill="#FBFCFF"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="spacer2"></div>
          <div class="carousel-container2">
            <div class="inner-carousel">
              <div class="track2">
                <?php 
                  if(isset($_SESSION["data_getin"])) {
                    $data = $_SESSION["data_getin"];
                    while($row = mysqli_fetch_array($data)) {
                      $subtitle = $row["subtitle"];
                      $title = $row["title"];
                      $content = $row["content"];
                      $image_url = $row["image_url"];
                      echo <<<EOD
                        <div class="card-container">
                          <div class="nd">
                            <div>
                              <div class="vergleichen-sie-unse2">$subtitle</div> 
                              <div class="vergleichen-sie-unse">$title</div>
                            </div>
                            <div>
                              <div class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt">
                                $content
                              </div>
                              <div class="button-group">
                                <div class="button">
                                  <div class="some-label">Read More</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <img src="../-ONEXTxTrain---Trainee-Trinh-c/uploads/$image_url" alt="Image">
                          </div>
                        </div>
                      EOD;
                    }
                  }
                ?>
                </div>
              </div>
            </div>
          <div class="spacer2"></div>
          <div class="carousel2">
            <div style="text-align:center; z-index: 1;">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
          <div class="spacer2"></div>
        </div>
      </div>
    </section>
    <div class="por-28-text-media-hero-large-heading-body-copy-image-video">
      <div class="spacer2"></div>
      <section class="frame-11662">
        <div class="frame-11661">
          <h2 class="porsche-driving-at-it-s-best-on-the-racetrack f-50 m-0">
            <?php echo $r["title5"] ?>
          </h2>
          <div
            class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt-ut-labore-et-dolore-magna-aliqua-ut-enim-ad-minim-veniam-quis-nostrud-exercitation-ullamco-laboris-nisi-ut-aliquip-ex-ea-commodo-consequat"
          >
            <?php if(isset($_SESSION["data_bg2"]))
                    $data = $_SESSION["data_bg2"];
                    $row = mysqli_fetch_array($data);
                    $content = $row["content"];
                    $image_url = $row["image_url"];
                    echo <<<EOD
                        $content
                        </div>
                      </div>
                      <div class="spacer"></div>
                      <div class="video-1920">
                      <img class="image-3" src="../-ONEXTxTrain---Trainee-Trinh-c/uploads/$image_url" alt="Image"/>
                    EOD;
            ?>
          <div class="frame-11847">
            <div class="button2">
              <div class="sound">
                <svg
                  class="mute"
                  width="25"
                  height="24"
                  viewBox="0 0 25 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M20.6512 9L21.4012 9.75L19.1512 12L21.4012 14.25L20.6512 15L18.4012 12.75L16.1512 15L15.4012 14.25L17.6512 12L15.4012 9.75L16.1512 9L18.4012 11.25L20.6512 9ZM13.4012 4V20L8.40125 15H3.40125V9H8.40125L13.4012 4ZM12.4012 6.414L8.81546 10H4.40125V14H8.81546L12.4012 17.585V6.414Z"
                    fill="white"
                  />
                </svg>
              </div>
            </div>
            <div class="spacer"></div>
            <div class="button2">
              <div class="pause">
                <svg
                  class="pause2"
                  width="25"
                  height="24"
                  viewBox="0 0 25 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M15.9012 5V19H14.9012V5H15.9012ZM9.90125 5V19H8.90125V5H9.90125Z"
                    fill="white"
                  />
                </svg>
              </div>
            </div>
          </div>
          <div class="spacer4"></div>
          <div class="spacer5"></div>
        </div>
      </div>
      <div class="spacer"></div>
    </section>
    <section class="por-39-carousel-1921">
      <div class="nav3">
        <div class="tiny-button">
          <div class="wrapper">
            <div class="close">
              <svg
                class="cancel"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M18 6.70588L12.7059 12L18 17.2941L17.2941 18L12 12.7059L6.70588 18L6 17.2941L11.2941 12L6 6.70588L6.70588 6L12 11.2941L17.2941 6L18 6.70588Z"
                  fill="#FBFCFF"
                />
                <path
                  d="M18 6.70588L12.7059 12L18 17.2941L17.2941 18L12 12.7059L6.70588 18L6 17.2941L11.2941 12L6 6.70588L6.70588 6L12 11.2941L17.2941 6L18 6.70588Z"
                  stroke="#FBFCFF"
                />
              </svg>
            </div>
          </div>
        </div>
        <div class="tiny-button">
          <div class="wrapper">
            <div class="close">
              <svg
                class="cancel2"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M18 6.70588L12.7059 12L18 17.2941L17.2941 18L12 12.7059L6.70588 18L6 17.2941L11.2941 12L6 6.70588L6.70588 6L12 11.2941L17.2941 6L18 6.70588Z"
                  fill="#FBFCFF"
                />
                <path
                  d="M18 6.70588L12.7059 12L18 17.2941L17.2941 18L12 12.7059L6.70588 18L6 17.2941L11.2941 12L6 6.70588L6.70588 6L12 11.2941L17.2941 6L18 6.70588Z"
                  stroke="#FBFCFF"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="frame-116682">
        <div class="carousel2">
          <div class="header">
            <div class="headline2">
              <h2 class="some-heading3">
                <?php echo $r["title6"] ?>
              </h2>
              <div class="spacer"></div>
            </div>
            <div class="nav2">
              <div class="tiny-button">
                <div class="wrapper">
                  <div class="arrow-left prev3">
                    <svg
                      class="arrow-open-full-left4"
                      width="24"
                      height="25"
                      viewBox="0 0 24 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M9.48104 19L4.00355 12.5034L4.00045 12.5008L4.00091 12.5003L3.99998 12.4992L4.00627 12.4939L9.48151 6.00001L10.25 6.64175L5.73226 12L19.9999 12L19.9999 13L5.7318 13L10.2495 18.3583L9.48104 19Z"
                        fill="#FBFCFF"
                      />
                    </svg>
                  </div>
                </div>
              </div>
              <div class="tiny-button">
                <div class="wrapper">
                  <div class="arrow-right next3">
                    <svg
                      class="arrow-open-full-right7"
                      width="24"
                      height="25"
                      viewBox="0 0 24 25"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14.5189 6L19.9964 12.4966L19.9995 12.4992L19.999 12.4997L20 12.5008L19.9937 12.5061L14.5184 19L13.7499 18.3582L18.2677 13L4.00004 13L4.00004 12L18.2681 12L13.7504 6.64175L14.5189 6Z"
                        fill="#FBFCFF"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="spacer2"></div>
        <div class="carousel-container3">
            <div class="track3">
              <?php 
                if(isset($_SESSION["data_footer"])) {
                  $data = $_SESSION["data_footer"];
                  while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $title = $row["title"];
                    $content = $row["content"];
                    echo <<<EOD
                      <div class="card-container1">
                        <div class="card">
                          <img src="../-ONEXTxTrain---Trainee-Trinh-c/uploads/$image_url" alt="Image">
                        </div>
                        <div class="text">
                          <div class="precision">
                            $title
                          </div>
                          <div class="spacer"></div>
                          <div
                            class="launch-control-can-be-activated-in-both-sport-and-sport-plus-mode-prepares-all-systems-for-maximum-acceleration-and-delivers-incredible-power-to-the-tarmac"
                          >
                            $content
                          </div>
                        </div>
                      </div>
                    EOD;
                  }
                }
              ?>
            </div>
        </div>
        <div class="spacer2"></div>
        <div class="carousel2">
          <div style="text-align:center; z-index: 1;">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
          </div>
        </div>
        <div class="spacer2"></div>
      </div>
    </section>
    
    <?php include "include/footer.php" ?>
  </div>
</div>


<!--  -->
<!--  -->
<!--  -->
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

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

///

const prev = document.querySelector(".prev1");
const next = document.querySelector(".next1");
const carousel = document.querySelector(".carousel-container");
const track = document.querySelector(".track");
let width = carousel.offsetWidth;
let index = 0;
window.addEventListener("resize", function () {
  width = carousel.offsetWidth;
});
next.addEventListener("click", function (e) {
  e.preventDefault();
  index = index + 1;
  prev.classList.add("show");
  track.style.transform = "translateX(" + index * -width + "px)";
  if (track.offsetWidth - index * width < index * width) {
    next.classList.add("hide");
  }
});
prev.addEventListener("click", function () {
  index = index - 1;
  next.classList.remove("hide");
  if (index === 0) {
    prev.classList.remove("show");
  }
  track.style.transform = "translateX(" + index * -width + "px)";
});

//
const prev2 = document.querySelector(".prev2");
const next2 = document.querySelector(".next2");
const carousel2 = document.querySelector(".carousel-container2");
const track2 = document.querySelector(".track2");
let width2 = carousel2.offsetWidth;
let index2 = 0;
window.addEventListener("resize", function () {
  width2 = carousel2.offsetWidth;
});
next2.addEventListener("click", function (e) {
  e.preventDefault();
  index2 = index2 + 1;
  prev2.classList.add("show");
  track2.style.transform = "translateX(" + index2 * -width2 + "px)";
  if (track2.offsetWidth - index2 * width2 < index2 * width2) {
    next2.classList.add("hide");
  }
});
prev2.addEventListener("click", function () {
  index2 = index2 - 1;
  next2.classList.remove("hide");
  if (index2 === 0) {
    prev2.classList.remove("show");
  }
  track2.style.transform = "translateX(" + index2 * -width2 + "px)";
});

///


const prev3 = document.querySelector(".prev3");
const next3 = document.querySelector(".next3");
const carousel3 = document.querySelector(".carousel-container3");
const track3 = document.querySelector(".track3");
let width3 = carousel3.offsetWidth;
let index3 = 0;
window.addEventListener("resize", function () {
  width3 = carousel3.offsetWidth;
});
next3.addEventListener("click", function (e) {
  e.preventDefault();
  index3 = index3 + 1;
  prev3.classList.add("show");
  track3.style.transform = "translateX(" + index3 * -width3 + "px)";
  if (track3.offsetWidth - index3 * width3 < index3 * width3) {
    next3.classList.add("hide");
  }
});
prev3.addEventListener("click", function () {
  index3 = index3 - 1;
  next3.classList.remove("hide");
  if (index3 === 0) {
    prev3.classList.remove("show");
  }
  track3.style.transform = "translateX(" + index3 * -width3 + "px)";
});

const contactBtn = document.querySelector(".contact-btn");
contactBtn.addEventListener("click", function() {
  window.open("http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/contactform.php", "_blank");
});

const fbBtn = document.querySelector(".fb-btn");
fbBtn.addEventListener("click", function() {
  window.open("https://www.facebook.com/", "_blank");
});

const insBtn = document.querySelector(".ins-btn");
insBtn.addEventListener("click", function() {
  window.open("https://www.instagram.com/", "_blank");
});

const pinBtn = document.querySelector(".pin-btn");
pinBtn.addEventListener("click", function() {
  window.open("https://www.pinterest.com/", "_blank");
});

const ytBtn = document.querySelector(".yt-btn");
ytBtn.addEventListener("click", function() {
  window.open("https://www.youtube.com/", "_blank");
});

const twBtn = document.querySelector(".tw-btn");
twBtn.addEventListener("click", function() {
  window.open("https://www.x.com/", "_blank");
});

const inBtn = document.querySelector(".in-btn");
inBtn.addEventListener("click", function() {
  window.open("https://www.linkedin.com/", "_blank");
});

const trackBtn = document.querySelector(".track-btn");
trackBtn.addEventListener("click", function() {
  window.scrollTo({
    top: 5900,
    behavior: 'smooth'
  });
});

const iceBtn = document.querySelector(".ice-btn");
iceBtn.addEventListener("click", function() {
  window.scrollTo({
    top: 7600,
    behavior: 'smooth'
  });
});

const travelBtn = document.querySelector(".travel-btn");
travelBtn.addEventListener("click", function() {
  window.scrollTo({
    top: 3000,
    behavior: 'smooth'
  });
});

const eventBtn = document.querySelector(".event-btn");
eventBtn.addEventListener("click", function() {
  window.scrollTo({
    top: 4500,
    behavior: 'smooth'
  });
});

const scrollToTop = document.querySelectorAll(".porsche-at-a-glance");
for(let i = 0; i < scrollToTop.length; i++) {
    scrollToTop[i].addEventListener("click", function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}
</script>
</body>
</html>
