$(function () {
	$('.has-clear input[type="text"], textarea, input[type="password"], input[type="email"]').on('input propertychange', function() {
	  var $this = $(this)
	  var visible = Boolean($this.val())
	  $this.siblings('.form-control-clear').toggleClass('hidden', !visible)
	}).trigger('propertychange')

	$('.form-control-clear').click(function() {
	  $(this).siblings('input[type="text"], textarea, input[type="password"], input[type="email"]').val('')
	    .trigger('propertychange').focus()
	})
})

function open_sub_window(url, windowname)
{
  popup = window.open(url, '_blank')
  popup.moveTo(0, 0);
  popup.resizeTo(screen.width, screen.height);
}

function fmoney(amt, n) {

  amt = Math.round(amt, n)

  if(n == undefined || n < 0 || n > 20) {
    n = 8;
  } else {
    n = n + 1;
  }
  if (amt.length <= 3) {
    return amt;
  }

  if(!/^(\+|-)?(\d+)(\.\d+)?$/.test(amt)) {
    return amt;
  }

  var a = RegExp.$1, b = RegExp.$2, c = RegExp.$3;
  var re = new RegExp();
  re.compile("(\\d)(\\d{3})(,|$)");
  while(re.test(b)) {
    b = b.replace(re, "$1,$2$3");
  }
  if(c.length > 2) {
    c = c.substr(0, n);
  }
  return a +""+ b +""+ c;
  // return s.toFixed(n).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

// ローディング表示
function showLoading(imgPath) {
    $('body').append('<div id="loading_box"><img src="' + imgPath + '"></div>');
}

// 表示したローディングを消す
function hideLoading() {
    $('#loading_box').remove();
}

function create_date_range_picker(ref_id, default_range) {
  ref_id = ref_id || 'daterange-btn'

  if (default_range !== void 0){
    $('#' + ref_id).val( default_range[0] + ' - ' + default_range[1])
  } else {
    $('#' + ref_id).val( moment().subtract(1, 'days').format('YYYY/MM/DD') + ' - ' + moment().subtract(1, 'days').format('YYYY/MM/DD'))
  }

  $('#' + ref_id).dateRangePicker(
    {
      autoClose: false,
      format: 'YYYY/MM/DD',
      separator: '-',
      language: 'auto',
      startOfWeek: 'sunday',// or monday
      getValue: function()
      {
        return $(this).val();
      },
      setValue: function(s)
      {
        if(!$(this).is(':disabled') && s != $(this).val())
        {
          $(this).val(s);
        }
      },
      startDate: new Date(2019, 0, 1),
      endDate: new Date(),
      time: {
        enabled: false
      },
      minDays: 0,
      maxDays: 0,
      showShortcuts: true,
      shortcuts:
      {
        'prev-days': [1,3,5,7],
        //'next-days': [3,5,7],
        'prev' : ['week','month'],
        //'next' : ['week','month']
      },
      customShortcuts : [],
      inline:false,
      container:'body',
      alwaysOpen:false,
      singleDate:false,
      lookBehind: false,
      batchMode: false,
      duration: 200,
      stickyMonths: false,
      dayDivAttrs: [],
      dayTdAttrs: [],
      applyBtnClass: '',
      singleMonth: 'auto',
      hoveringTooltip: function(days, startTime, hoveringTime)
      {
        return days > 1 ? days + ' ' + 'days' : '';
      },
      showTopbar: true,
      swapTime: false,
      selectForward: false,
      selectBackward: false,
      showWeekNumbers: false,
      getWeekNumber: function(date) //date will be the first day of a week
      {
        return moment(date).format('w');
      },
      monthSelect: true,
      yearSelect: true
    }
  );
}

function create_date_range_picker_ym(ref_id, default_range) {
  ref_id = ref_id || 'daterange-btn'

  if (default_range !== void 0){
    $('#' + ref_id).val( default_range[0] + ' - ' + default_range[1])
  } else {
    $('#' + ref_id).val( moment().subtract(1, 'days').format('YYYY/MM') + ' - ' + moment().subtract(1, 'days').format('YYYY/MM'))
  }

  $('#' + ref_id).dateRangePicker(
    {
      autoClose: false,
      format: 'YYYY/MM',
      separator: '-',
      language: 'auto',
      startOfWeek: 'sunday',// or monday
      getValue: function()
      {
        return $(this).val();
      },
      setValue: function(s)
      {
        if(!$(this).is(':disabled') && s != $(this).val())
        {
          $(this).val(s);
        }
      },
      startDate: new Date(2019, 0, 1),
      endDate: new Date(),
      time: {
        enabled: false
      },
      minDays: 0,
      maxDays: 0,
      showShortcuts: true,
      shortcuts:
      {
        'prev-days': [1,3,5,7],
        //'next-days': [3,5,7],
        'prev' : ['week','month'],
        //'next' : ['week','month']
      },
      customShortcuts : [],
      inline:false,
      container:'body',
      alwaysOpen:false,
      singleDate:false,
      lookBehind: false,
      batchMode: false,
      duration: 200,
      stickyMonths: false,
      dayDivAttrs: [],
      dayTdAttrs: [],
      applyBtnClass: '',
      singleMonth: 'auto',
      hoveringTooltip: function(days, startTime, hoveringTime)
      {
        return days > 1 ? days + ' ' + 'days' : '';
      },
      showTopbar: true,
      swapTime: false,
      selectForward: false,
      selectBackward: false,
      showWeekNumbers: false,
      getWeekNumber: function(date) //date will be the first day of a week
      {
        return moment(date).format('w');
      },
      monthSelect: true,
      yearSelect: true
    }
  );
}

function get_axios() {
  var domain = window.location.href.replace('http://','').replace('https://','').split(/[/?#]/)[1];
  var url =  window.location.protocol + "//" + window.location.host + "/" + domain + "/"
  return axios.create({ baseURL:  url });
}

function get_date_range(url, callback) {
    query_url = url + (url.endsWith('/') ? 'range' : '/range')
    get_axios().get(query_url, {
      headers: {"X-CSRFToken": csrfToken}
    }).then(response => {
      var date_range = response.data;
      if (date_range) {
        callback([date_range.start, date_range.end])
      }
    }).catch(err => {
      var dt = new Date();
      var y = dt.getFullYear();
      var m = ("00" + (dt.getMonth()+1)).slice(-2);
      var d = ("00" + dt.getDate()).slice(-2);
      var ymd = y + m +  d;
      callback([ymd, ymd])
    })
}

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)',
  color1: "#F7464A",
  color2: "#8e5ea2",
  color3: "#3cba9f",
  color4: "#6fcd4a",
  color5: "#3e95cd",
  color6: "#46BFBD",
  color7: "#FDB45C",
  color8: 'rgb(153, 102, 255)',
  color9: "#e8c3b9",
  color10: "#252525",
  color21: "#800026",
  color22: "#bd0026",
  color23: "#e31a1c",
  color24: "#fc4e2a",
  color25: "#fd8d3c",
  color26: "#feb24c",
  color27: "#fed976",
  color28: '#ffeda0',
  color29: "#ffffcc",
  color30: "#252525",
  randomColor:function(opacity){
    var seed1 = Math.round(Math.random() * 255)
    var seed2 = Math.round(Math.random() * 255)
    var seed3 = Math.round(Math.random() * 255)
    return (
      "rgba(" +
      seed1+
      "," +
      seed2 +
      "," +
      seed3 +
      "," +
      (opacity || ".3") +
      ")"
    );
  }
};

function gethostwebname() {
  var curPath=window.document.location.href;
  var pathName=window.document.location.pathname;
  var pos=curPath.indexOf(pathName);
  var localhostPaht=curPath.substring(0, pos);
  var projectName=pathName.substring(0, pathName.substr(1).indexOf('/')+1);
  return localhostPaht + projectName;
}

/**
 * 半年間または31日の間範囲取得
 * @param num 数字
 * @param daymonthkbn 月/日区分
* */
function getBefroeDate(num, daymonthkbn) {
  var date = new Date();
  var year= date.getFullYear();
  if(daymonthkbn == 1) {
    date.setDate(date.getDate() - num);
  } else {
    date.setMonth(date.getMonth() - num);
  }
  var month= date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1;
  var day= date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
  if(daymonthkbn == 1) {
    return year + month + day;
  } else {
    return year + month;
  }
}

function getPreDay(s, n){
  var y = parseInt(s.substr(0,4), 10);
  var m = parseInt(s.substr(4,2), 10)-1;
  var d = parseInt(s.substr(6,2), 10);
  var dt = new Date(y, m, d-n);
  y = dt.getFullYear();
  m = dt.getMonth()+1;
  d = dt.getDate();
  m = m<10?"0"+m:m;
  d = d<10?"0"+d:d;
  return y + "" + m + "" + d;
}

Date.prototype.format_as_yyyymmdd_with_slash = function(){
  var a = this;
  var y = a.getFullYear();
  var m = a.getMonth() + 1;
  m = m < 10 ? ('0' + m) : m;
  var d = a.getDate();
  d = d < 10 ? ('0' + d) : d;
  return y + "/" + m + "/" + d;
}
Date.prototype.format_as_yyyymmdd = function(){
  var a = this;
  var y = a.getFullYear() + '';
  var m = a.getMonth() + 1;
  m = m < 10 ? ('0' + m) : m;
  m = m + ''
  var d = a.getDate();
  d = d < 10 ? ('0' + d) : d;
  d  = d + ''
  return y  +  m + d;
}
Date.prototype.get_past_date = function(days){
  var a = this;
  var d = new Date(a.getFullYear(), a.getMonth(), a.getDate(), 0, 0, 0);
  d.setDate(d.getDate()-days);
  return d;
}

String.prototype.format = function () {
  var a = this;
  for (var k in arguments) {
      a = a.replace(new RegExp("\\{" + k + "\\}", 'g'), arguments[k]);
  }
  return a
}
String.prototype.format_as_yyyymmdd_with_slash = function () {
  var a = this;
  return a.replace(/(\d{4})(\d{2})(\d{2})/, '$1/$2/$3')
}
String.prototype.format_as_mmdd_with_slash = function () {
  var a = this;
  return a.replace(/(\d{4})(\d{2})(\d{2})/, '$2/$3')
}
String.prototype.parse_date = function () {
  var a = this;
  if ( a.indexOf('/') > 0 ) {
    var slices = a.split('/')
    return new Date(parseInt(slices[0], 0), parseInt(slices[1], 0)-1, parseInt(slices[2], 0), 0, 0, 0);
  } else {
    var y = a.substring(0,4)
    var m = a.substring(4,6)
    var d = a.substring(6)
    return new Date(parseInt(y, 0), parseInt(m, 0)-1, parseInt(d, 0), 0, 0, 0);
  }
}

String.prototype.trim = function () {
  var a = this;
  return a.replace(/(^\s*)|(\s*$)/g, "");
}

function comm_dynamic_colors() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);
  return "rgb(" + r + "," + g + "," + b + ")";
}

function comm_format_date(date, format) {
  format = format.replace(/YYYY/, date.getFullYear());
  var mm = date.getMonth() + 1
  if (mm < 10) {
    mm = '0' + mm;
  }
  format = format.replace(/MM/, mm);
  var dd = date.getDate();
  if (dd < 10) {
    dd = '0' + dd;
  }
  format = format.replace(/DD/, dd);
  return format;
}

function comm_clear_canvas(canvas_id){
  var canv = document.getElementById(canvas_id);
  pa = canv.parentElement;
  if(pa){
      pa.removeChild(canv)
      canv = document.createElement('canvas');
      canv.id = canvas_id;
      pa.appendChild(canv);
  }
}

function getPercent(num, total, scare) {
  return (Math.round(num / total * 10000) / 100.00 + "%");
}