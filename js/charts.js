// // Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
//alert("Hello");
function chartPositif() {
  const urlParams = new URLSearchParams(window.location.search);
  const myParam = urlParams.get("provinsi");

  console.log(myParam);

  fetch(`../get_penyebaran.php?provinsi=${myParam}`)
    .then((res) => {
      res
        .json()
        .then((response) => {
          console.log(response);

          let labels = response.map((el) => el.tanggal);
          let datas = response.map((el) => el.jumlah_positif);

          console.log(datas);

          var ctx = document.getElementById("chart");
          var myLineChart = new Chart(ctx, {
            type: "bar",
            data: {
              labels: labels,
              datasets: [
                {
                  label: "Jumlah kasus positif:",
                  backgroundColor: "#43bde6",
                  borderColor: "#43bde6",

                  data: datas,
                },
              ],
            },
            options: {
              scales: {
                xAxes: [
                  {
                    time: {
                      unit: "date",
                    },
                    gridLines: {
                      display: false,
                    },
                    ticks: {
                      maxTicksLimit: 5,
                    },
                  },
                ],
                yAxes: [
                  {
                    ticks: {
                      min: 10,
                      max: 200,
                      maxTicksLimit: 5,
                    },
                    gridLines: {
                      display: true,
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
            },
          });
        })
        .catch((e) => console.log(e));
    })
    .catch((err) => console.log(err));
}

function chartMeninggal() {
  const urlParams = new URLSearchParams(window.location.search);
  const myParam = urlParams.get("provinsi");

  console.log(myParam);

  fetch(`../get_penyebaran.php?provinsi=${myParam}`)
    .then((res) => {
      res
        .json()
        .then((response) => {
          console.log(response);

          let labels = response.map((el) => el.tanggal);
          let datas = response.map((el) => el.jumlah_meninggal);

          console.log(datas);

          var ctx = document.getElementById("meninggal");
          var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
              labels: labels,
              datasets: [
                {
                  label: "Jumlah Kasus Meninggal Dunia:",
                  backgroundColor: "#43bde6",
                  borderColor: "#43bde6",
                  data: datas,
                },
              ],
            },
            options: {
              scales: {
                xAxes: [
                  {
                    time: {
                      unit: "date",
                    },
                    gridLines: {
                      display: false,
                    },
                    ticks: {
                      maxTicksLimit: 5,
                    },
                  },
                ],
                yAxes: [
                  {
                    ticks: {
                      min: 0,
                      max: 100,
                      maxTicksLimit: 5,
                    },
                    gridLines: {
                      display: true,
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
            },
          });
        })
        .catch((e) => console.log(e));
    })
    .catch((err) => console.log(err));
}

function chartSembuh() {
  const urlParams = new URLSearchParams(window.location.search);
  const myParam = urlParams.get("provinsi");

  console.log(myParam);

  fetch(`../get_penyebaran.php?provinsi=${myParam}`)
    .then((res) => {
      res
        .json()
        .then((response) => {
          console.log(response);

          let labels = response.map((el) => el.tanggal);
          let datas = response.map((el) => el.jumlah_sembuh);

          console.log(datas);

          var ctx = document.getElementById("sembuh");
          var myLineChart = new Chart(ctx, {
            type: "horizontalBar",
            data: {
              labels: labels,
              datasets: [
                {
                  label: "Jumlah Kasus Sembuh:",
                  backgroundColor: "#43bde6",
                  borderColor: "#43bde6",
                  data: datas,
                },
              ],
            },
            options: {
              scales: {
                xAxes: [
                  {
                    time: {
                      unit: "date",
                    },
                    gridLines: {
                      display: false,
                    },
                    ticks: {
                      maxTicksLimit: 5,
                    },
                  },
                ],
                yAxes: [
                  {
                    ticks: {
                      min: 0,
                      max: 100,
                      maxTicksLimit: 5,
                    },
                    gridLines: {
                      display: true,
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
            },
          });
        })
        .catch((e) => console.log(e));
    })
    .catch((err) => console.log(err));
}
