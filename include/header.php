<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div
        class="hero"
        style="
          /* background: url('../-ONEXTxTrain---Trainee-Trinh-c/style/img/Hero.png'); */
          background-size: cover;
          background-repeat: no-repeat;
        "
    >
        <div class="slideshow-container">
            <?php if(isset($_SESSION["data_header"]))
                    $data = $_SESSION["data_header"];
                    while($row = mysqli_fetch_array($data)) {
                      $image_url = $row["image_url"];
                      echo <<<EOD
                                            <div class="mySlides fade">
                                              <img src="../-ONEXTxTrain---Trainee-Trinh-c/style/img/$image_url" style="width:100%">
                                            </div>
                      EOD;
                    }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <div style="text-align:center; z-index: 1;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <div class="nav">
          <div class="menu">
            <div class="pe-logo">
              <div class="porsche-experience-rgb-neg-1-new">
                <svg
                  class="group2"
                  width="180"
                  height="36"
                  viewBox="0 0 180 36"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.7891 7.71231C19.4906 7.71231 20.4047 6.81231 20.4047 5.13692V2.57538C20.4047 0.9 19.4906 0 17.7891 0H0V10.4677H2.40469V7.71231H17.7891ZM18 2.72769V4.98461C18 5.26154 17.8453 5.4 17.5781 5.4H2.40469V2.29846H17.5781C17.8453 2.29846 18 2.45077 18 2.72769ZM26.0719 10.4677C24.3703 10.4677 23.4563 9.56769 23.4563 7.89231V2.57538C23.4563 0.9 24.3703 0 26.0719 0H40.8516C42.5531 0 43.4672 0.9 43.4672 2.57538V7.87846C43.4672 9.55385 42.5531 10.4538 40.8516 10.4538H26.0719V10.4677ZM40.6406 8.16923C40.9219 8.16923 41.0625 8.01692 41.0625 7.75385V2.72769C41.0625 2.45077 40.9078 2.31231 40.6406 2.31231H26.2969C26.0156 2.31231 25.875 2.46462 25.875 2.72769V7.75385C25.875 8.03077 26.0297 8.16923 26.2969 8.16923H40.6406ZM64.5609 6.90923C65.9672 7.49077 66.9656 8.86154 66.9656 10.4677H64.5609C64.5609 8.58461 63.675 7.71231 61.7625 7.71231H48.9656V10.4677H46.5609V0H64.35C66.0516 0 66.9656 0.9 66.9656 2.57538V4.32C66.9656 5.94 66.1219 6.84 64.5609 6.90923ZM64.1391 5.41385C64.4203 5.41385 64.5609 5.26154 64.5609 4.99846V2.72769C64.5609 2.45077 64.4062 2.31231 64.1391 2.31231H48.9656V5.41385H64.1391ZM69.8766 2.57538C69.8766 0.9 70.7906 0 72.4922 0H89.9297V1.95231H72.7031C72.4219 1.95231 72.2812 2.10462 72.2812 2.36769V3.83538C72.2812 4.11231 72.4359 4.25077 72.7031 4.25077H87.6516C89.3531 4.25077 90.2672 5.15077 90.2672 6.82615V7.87846C90.2672 9.55385 89.3531 10.4538 87.6516 10.4538H70.2141V8.51538H87.4406C87.7219 8.51538 87.8625 8.36308 87.8625 8.1V6.63231C87.8625 6.35538 87.7078 6.21692 87.4406 6.21692H72.4922C70.7906 6.21692 69.8766 5.31692 69.8766 3.64154V2.57538ZM93.2906 2.57538C93.2906 0.9 94.2188 0 95.9203 0H112.922V2.29846H96.1312C95.85 2.29846 95.7094 2.45077 95.7094 2.71385V7.74C95.7094 8.01692 95.8641 8.15538 96.1312 8.15538H112.922V10.4538H95.9203C94.2188 10.4538 93.3047 9.55385 93.3047 7.87846V2.57538H93.2906ZM135.253 0V10.4677H132.848V6.38308H118.42V10.4677H116.016V0H118.42V4.08462H132.848V0H135.253ZM140.78 1.95231V4.25077H159.455V6.20308H140.78V8.50154H159.455V10.4538H138.361V0H159.441V1.95231H140.78Z"
                    fill="white"
                  />
                  <path
                    d="M179.381 16.0879H0V19.231H179.381V16.0879Z"
                    fill="#DC0527"
                  />
                  <path
                    d="M0 25.3125H5.93437V27.0294H1.92656V29.4248H5.59687V31.031H1.92656V33.6479H5.93437V35.171H0V25.3125Z"
                    fill="white"
                  />
                  <path
                    d="M10.2098 30.1564L7.552 25.2964H9.66138L11.4333 28.5918L13.2051 25.2964H15.1458L12.4739 30.1564L15.2161 35.1548H13.1067L11.2645 31.721L9.40825 35.1548H7.48169L10.2098 30.1564Z"
                    fill="white"
                  />
                  <path
                    d="M16.7926 25.3125H20.477C22.5723 25.3125 23.4582 26.1433 23.4582 28.4833C23.4582 31.031 22.5442 31.751 20.4489 31.751H18.7192V35.171H16.7926V25.3125ZM18.7192 27.0156V30.131H20.1817C21.2223 30.131 21.4754 29.9094 21.4754 28.5387C21.4754 27.2787 21.1801 27.0156 20.1817 27.0156H18.7192Z"
                    fill="white"
                  />
                  <path
                    d="M25.3674 25.3125H31.3018V27.0294H27.294V29.4248H30.9643V31.031H27.294V33.6479H31.3018V35.171H25.3674V25.3125Z"
                    fill="white"
                  />
                  <path
                    d="M33.382 25.3125H36.996C39.0913 25.3125 40.0476 26.0463 40.0476 28.4833C40.0476 30.311 39.4851 31.1556 38.3601 31.4187L40.3429 35.171H38.2195L36.5038 31.751H35.3085V35.171H33.382V25.3125ZM35.3085 27.0156V30.131H36.7429C37.7132 30.131 38.0648 29.9925 38.0648 28.5387C38.0648 27.2094 37.7273 27.0156 36.6866 27.0156H35.3085Z"
                    fill="white"
                  />
                  <path
                    d="M42.16 25.3125H44.0866V35.171H42.16V25.3125Z"
                    fill="white"
                  />
                  <path
                    d="M46.5326 25.3125H52.467V27.0294H48.4592V29.4248H52.1295V31.031H48.4592V33.6479H52.467V35.171H46.5326V25.3125Z"
                    fill="white"
                  />
                  <path
                    d="M54.5471 25.3125H56.5862L59.8768 31.6402V25.3125H61.6768V35.171H59.7643L56.3471 28.6079V35.171H54.5471V25.3125Z"
                    fill="white"
                  />
                  <path
                    d="M63.7427 30.199C63.7427 26.1698 64.6427 25.1313 67.6099 25.1313C70.5349 25.1313 70.9989 26.3221 71.1114 29.0083H69.2411C69.1708 27.3052 68.8896 26.8483 67.6099 26.8483C65.9927 26.8483 65.7536 27.319 65.7536 30.1713C65.7536 33.4252 65.9927 33.799 67.6099 33.799C68.8896 33.799 69.1708 33.3006 69.2411 31.5698H71.1114C70.9989 34.2283 70.2396 35.3221 67.6099 35.3221C64.5021 35.3221 63.7427 34.076 63.7427 30.199Z"
                    fill="white"
                  />
                  <path
                    d="M73.0701 25.3125H79.0044V27.0294H74.9966V29.4248H78.6669V31.031H74.9966V33.6479H79.0044V35.171H73.0701V25.3125Z"
                    fill="white"
                  />
                </svg>
              </div>
            </div>
            <div class="frame-11646">
              <div class="nav-link-dark">
                <div><a class="label" target="_blank" href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/login.php">My Account</a></div>
              </div>
              <div class="nav-link-dark">
                <div class="label">Contact</div>
              </div>
              <div class="frame-10673">
                <div class="menu-button-dark">
                  <div class="menu-lines">
                    <svg
                      class="list"
                      width="25"
                      height="24"
                      viewBox="0 0 25 24"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M20.8 6.5V7.5H4.79999V6.5H20.8ZM4.79999 12.5H20.8V11.5H4.79999V12.5ZM4.79999 17.5H20.8V16.5H4.79999V17.5Z"
                        fill="white"
                      />
                    </svg>
                  </div>
                  <div class="spacer"></div>
                  <div class="label">Menu</div>
                </div>
              </div>
            </div>
            <div class="frame-10672">
              <div class="nav-link-dark">
                <div class="label">Track</div>
              </div>
              <div class="nav-link-dark">
                <div class="label">Ice</div>
              </div>
              <div class="nav-link-dark">
                <div class="label">Travel</div>
              </div>
              <div class="nav-link-dark">
                <div class="label">Events</div>
              </div>
            </div>
          </div>
        </div>
        <div class="gradient-black"></div>
        <div class="frame-11815">
          <div class="frame-10674">
            <div class="frame-10561">
              <div class="porsche-experience-inspiration-with-every-kilometre">
                    <?php echo $r["title1"] ?>
              </div>
              <div class="spacer"></div>
              <div class="spacer"></div>
              <div class="button">
                <div class="some-label">Read More</div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>