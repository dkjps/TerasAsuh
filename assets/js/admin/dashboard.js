"use strict";

//chart besar
//Draw Chart Versi Line V2
var statistics_chart = document.getElementById("testChart").getContext('2d');
var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: 'Statistics',
      data: [640, 387, 530, 302, 430, 270, 488, 1000, 900, 700, 300, 100],
      borderWidth: 5,
      borderColor: '#fc0335',
      backgroundColor: 'transparent',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }, 
    {
      label: 'Statistics 2',
      data: [340, 687, 1030, 602, 830, 670, 988, 100, 400, 200, 700, 900],
      borderWidth: 5,
      borderColor: '#fcba03',
      backgroundColor: 'transparent',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    },
    {
      label: 'Statistics 3',
      data: [440, 887, 230, 902, 630, 870, 288, 500, 600, 500, 500, 400],
      borderWidth: 5,
      borderColor: '#1dd909',
      backgroundColor: 'transparent',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 150
        }
      }],
      xAxes: [{
        gridLines: {
          color: '#fbfbfb',
          lineWidth: 2
        }
      }]
    },
  }
});

//JS Pie Chart Kategori
var ctx = document.getElementById("chart-kategori-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        40,
        130,
        213,
        10,
        67,
        122
      ],
      backgroundColor: [
        '#ffa426',
        '#fc544b',
        '#6777ef',
        '#a832a6',
        '#63ed7a',
        '#eb2d7c'
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Institusi Pendidikan',
      'Rumah Sakit',
      'Dinas Kesehatan',
      'PKM',
      'Mahasiswa',
      'Masyarakat Umum'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

//JS Doughnut Chart Untuk Pekerjaan
var ctx = document.getElementById("chart-pekerjaan-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        80,
        50,
        40,
        30,
        20,
      ],
      backgroundColor: [
        '#a832a6',
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Pengusaha',
      'Guru',
      'Ibu Rumah Tangga',
      'Wiraswasta',
      'Tidak Bekerja'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

//JS Chart Untuk Kota
var ctx = document.getElementById("chart-kota-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'horizontalBar',
  data: {
    labels: ["Malang", "Surabaya", "Ponorogo", "Banyuwangi", "Nganjuk", "Solo"],
    datasets: [{
      label: 'Statistics',
      data: [460, 458, 330, 502, 430, 610, 488],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 150
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

//JS Chart Untuk Kota
var ctx = document.getElementById("chart-provinsi-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'horizontalBar',
  data: {
    labels: ["Jawa Timur", "Jawa Tengah", "Jawa Barat", "Sumatera", "Kalimantan", "Bali"],
    datasets: [{
      label: 'Statistics',
      data: [460, 458, 330, 502, 430, 610, 488],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 150
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

//JS Chart Untuk Skrining User Akhir ini
var ctx = document.getElementById("chart-skrining-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        140,
        830,
      ],
      backgroundColor: [
        '#e30505',
        '#04cf18',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Positif',
      'Negatif',
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

//JS Chart Untuk Skrining User Akhir ini
var ctx = document.getElementById("chart-skrining-khusus-user").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        420,
        1130,
      ],
      backgroundColor: [
        '#e30505',
        '#04cf18',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Positif',
      'Negatif',
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

//Chart untuk Skrining pertanggal by status
var statistics_chart = document.getElementById("chart-skrining-pertanggal-user").getContext('2d');
var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: ["Hari Ke-1","Hari Ke-7", "Hari Ke-14", "Hari Ke-21", "Hari Ke-28", "Hari Ke-35"],
    datasets: [{
      label: 'Positif',
      data: [200,300,640, 387, 530, 302],
      borderWidth: 5,
      borderColor: '#c40c0c',
      fill: false,
      backgroundColor: '#c40c0c',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    },
    {
      label: 'Negatif',
      data: [600,400,340, 687, 1030, 602],
      borderWidth: 5,
      borderColor: '#00bf03',
      fill: false,
      backgroundColor: '#00bf03',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 150
        }
      }],
      xAxes: [{
        gridLines: {
          color: '#fbfbfb',
          lineWidth: 2
        }
      }]
    },
  }
});

//Chart untuk Skrining Pertanggal Khusus Rentan
var statistics_chart = document.getElementById("chart-skrining-pertanggal-rentan-user").getContext('2d');
var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: ["Hari Ke-1","Hari Ke-7", "Hari Ke-14", "Hari Ke-21", "Hari Ke-28", "Hari Ke-35"],
    datasets: [{
      label: 'Positif',
      data: [ 400, 100, 640, 387, 530, 302],
      borderWidth: 5,
      borderColor: '#c40c0c',
      fill: false,
      backgroundColor: '#c40c0c',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    },
    {
      label: 'Negatif',
      data: [ 300, 800, 340, 687, 1030, 602],
      borderWidth: 5,
      borderColor: '#00bf03',
      fill: false,
      backgroundColor: '#00bf03',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 150
        }
      }],
      xAxes: [{
        gridLines: {
          color: '#fbfbfb',
          lineWidth: 2
        }
      }]
    },
  }
});

$("#products-carousel").owlCarousel({
  items: 3,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 5000,
  loop: true,
  responsive: {
    0: {
      items: 2
    },
    768: {
      items: 2
    },
    1200: {
      items: 3
    }
  }
});

function dataDashboard(){
  jQuery.ajax({
    type: 'get',
    "url": "dashboard-data",
    dataType: 'json',
    beforeSend: function () {
    },
    success: function (response) {
      console.log(response);
      //console.log(response.data.jumlah_user_kelas[0].jumlah);
      $('#dashboard-summary-kelas').text(response.data.jumlah_user_kelas[0].jumlah);
      $('#dashboard-summary-kader').text(response.data.jumlah_user_kelas[1].jumlah);
      $('#dashboard-summary-peserta').text(response.data.jumlah_user_kelas[2].jumlah);
      $('#dashboard-summary-keluarga-binaan').text(response.data.jumlah_user_kelas[3].jumlah);
      //setDataSummary("dashboard-summary-kelas", response.data.jumlah_user_kelas[0].jumlah);
    },
    error: function (xhr, ajaxOptions, thrownError) {
    },
    complete:function(){
    }
  });
}

$(document).ready(function () {
  dataDashboard();
});