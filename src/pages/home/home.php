<?php
include_once '../../database/utils.php';

console_log(isset($_SESSION['email']));
console_log(isset($_SESSION['password']));



// if ($hasUserEmail == false) {
//   redirectURL('../login-cadastro/login-cadastro.html');
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tasks++ 🏠 Home</title>
  <meta property="og:image" itemprop="image" content="../../assets/icons/logo-share.jpg" />
  <meta property="og:type" content="website" />
  <link rel="stylesheet" href="../../../src/styles/base.css" />
  <link rel="stylesheet" href="../../../src/styles/component.css" />
  <link rel="stylesheet" href="../../../src/styles/keyframes.css" />
  <link rel="stylesheet" href="../../../src/styles/variables.css" />
  <link rel="stylesheet" href="../../../src/styles/responsive-helpers.css" />
  <link rel="stylesheet" href="styles.css" />
  <script src="../../scripts/global.js"></script>
</head>

<body>
  <section class="container">
    <main-header class="l-header" selected="home"></main-header>

    <main class="l-main">
      <section class="fade is-pulsing most-studied">
        <header class="most-studied__header">
          <img class="header__icon" src="../../assets/img/open-book.svg" alt="" />
          <h3 class="header__title">Matérias mais estudadas</h3>
        </header>
        <div class="most-studied__content">
          <div class="subject">
            <h3 class="subject__title">Matemática</h3>
            <div class="subject__time">
              <img class="time__icon" alt="Ícone Cronometro" />
              <span class="time__text">1h 2m 5s</span>
            </div>
          </div>
          <div class="subject">
            <h3 class="subject__title">Português</h3>
            <div class="subject__time">
              <img class="time__icon" alt="Ícone Cronometro" />
              <span class="time__text">1h 2m 5s</span>
            </div>
          </div>
        </div>
      </section>

      <section class="fade chart-last-days">
        <div class="c-chart">
          <h1>Últimos 7 dias</h1>
          <div class="c-cart__image" id="barChart" style="height: 370px; width: 100%"></div>
        </div>
      </section>

      <section class="fade recent-activities">
        <header class="recent-activities__header">
          <img src="../../assets/img/calendar.png" alt="" />
          <div>
            <h2>Atividades Recentes</h2>
            <span>Hoje 1 de outubro de 2020 </span>
          </div>
        </header>

        <div class="all-tabs-container">
          <div class="tabs">
            <div class="tab tab-1">
              <input type="radio" id="tab-1" name="tab-group-1" />
              <label for="tab-1">Hoje</label>
            </div>
            <div class="tab tab-2">
              <input type="radio" id="tab-2" name="tab-group-1" />
              <label for="tab-2">Ontem</label>
            </div>
          </div>

          <div data-toggle="tab-1" class="tab-content tab--active">
            <task-activity subject="História" content="Primeira Guerra Mundial" description="Inicio da guerra. Países envolvidos" hour="11:03" time="01h 30m 05s">
            </task-activity>

            <task-activity subject="Matemática" content="Conjuntos Numéricos" description="Operações aritméticas, expressões" hour="06:36" time="37m 45s">
            </task-activity>

            <task-activity subject="Português" content="Acentuação" description="Acento de intensidade e significado da palavra." hour="08:20" time="20m 17s">
            </task-activity>

            <task-activity subject="English" content="Active Listening" description="Reviewing Your Website Designs Live - with Gary Simon." hour="06:36" time="15m 57s">
            </task-activity>
          </div>

          <div data-toggle="tab-2" class="tab-content">
            <task-activity subject="História" content="Primeira Guerra Mundial" description="Inicio da guerra. Países envolvidos" hour="11:03" time="01h 30m 05s">
            </task-activity>

            <task-activity subject="Matemática" content="Conjuntos Numéricos" description="Operações aritméticas, expressões" hour="06:36" time="37m 45s">
            </task-activity>

            <task-activity subject="Português" content="Acentuação" description="Acento de intensidade e significado da palavra." hour="08:20" time="20m 17s">
            </task-activity>

            <task-activity subject="English" content="Active Listening" description="Reviewing Your Website Designs Live - with Gary Simon." hour="06:36" time="15m 57s">
            </task-activity>

            <task-activity subject="História" content="Primeira Guerra Mundial" description="Inicio da guerra. Países envolvidos" hour="11:03" time="01h 30m 05s">
            </task-activity>

            <task-activity subject="Matemática" content="Conjuntos Numéricos" description="Operações aritméticas, expressões" hour="06:36" time="37m 45s">
            </task-activity>

            <task-activity subject="Português" content="Acentuação" description="Acento de intensidade e significado da palavra." hour="08:20" time="20m 17s">
            </task-activity>

            <task-activity subject="English" content="Active Listening" description="Reviewing Your Website Designs Live - with Gary Simon." hour="06:36" time="15m 57s">
            </task-activity>
          </div>
        </div>
      </section>
    </main>
  </section>
</body>
<script src="../../components/header/header.js"></script>
<script src="../../components/menu-list/menu-list.js"></script>
<script src="../../components/user-info/user-info.js"></script>
<script src="../../components/activity/task-activity.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
  window.onload = () => {
    const $mostStudies = document.querySelector(".most-studied");
    const $recentActivities = document.querySelector(".recent-activities");
    const $openSideNavButton = document.querySelector(".c-menu__button.mobile-only");
    const $closeSideNavButton = document.querySelector(".js-close-button");

    $openSideNavButton.addEventListener("click", () => {
      $recentActivities.style.zIndex = -1;
    });
    $closeSideNavButton.addEventListener("click", () => {
      setTimeout(() => {
        $recentActivities.style.zIndex = 0;
      }, 500);
    });
  };

  const $radios = document.querySelectorAll(".tab > input");
  const $tabs = [...document.querySelectorAll(`[data-toggle^=tab]`)];
  let previousRadio;

  const toggleClass = ({
    id
  }) => {
    const $tab = $tabs.find((c) => c.attributes["data-toggle"].value === id);
    $tab.classList.toggle("tab--active");
  };

  const activateTab = ($radio) => {
    [previousRadio, $radio].forEach((c) => toggleClass(c));
    previousRadio = $radio;
  };

  $radios.forEach((radio, index) => {
    index === 0 && (radio.checked = true) && (previousRadio = radio);
    radio.addEventListener("change", (event) => activateTab(event.target));
  });

  var chart = new CanvasJS.Chart("barChart", {
    axisY: {
      includeZero: false,
      interval: 60 * 1000,
      labelFormatter: function(e) {
        return CanvasJS.formatDate(e.value, `hh'h' mm'm'`);
      },
    },

    toolTip: {
      contentFormatter: function(e) {
        return CanvasJS.formatDate(e.entries[0].dataPoint.y, `hh'h 'mm'm' ss's'`);
      },
    },

    data: [{
      type: "column",
      dataPoints: [{
          x: 10,
          y: new Date(2016, 1, 15, 8, 16, 15)
        },
        {
          x: 20,
          y: new Date(2016, 1, 15, 8, 16, 35)
        },
        {
          x: 30,
          y: new Date(2016, 1, 15, 8, 16, 05)
        },
        {
          x: 40,
          y: new Date(2016, 1, 15, 8, 15, 15)
        },
        {
          x: 50,
          y: new Date(2016, 1, 15, 8, 17, 15)
        },
        {
          x: 60,
          y: new Date(2016, 1, 15, 8, 16, 50)
        },
        {
          x: 70,
          y: new Date(2016, 1, 15, 8, 18, 15)
        },
        {
          x: 80,
          y: new Date(2016, 1, 15, 8, 16, 15)
        },
        {
          x: 90,
          y: new Date(2016, 1, 15, 8, 14, 15)
        },
      ],
    }, ],
  });

  changeDateTimeToTimestamp(chart.options.data);
  chart.render();

  function changeDateTimeToTimestamp(data) {
    for (var i = 0; i < data.length; i++) {
      var dataSeries = data[i];
      for (var j = 0; j < dataSeries.dataPoints.length; j++) {
        if (dataSeries.dataPoints[j].y.getTime) dataSeries.dataPoints[j].y = dataSeries.dataPoints[j].y.getTime();
      }
    }
  }
</script>

</html>