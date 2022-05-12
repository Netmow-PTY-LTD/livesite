<?php
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $allbusinessinfo->business_name; ?> </title>
    <link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--<link rel="stylesheet" href="css/style.css">-->

<style type="text/css">

/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


/*!
 * Bootstrap Grid v5.0.0-beta2 (https://getbootstrap.com/)
 * Copyright 2011-2021 The Bootstrap Authors
 * Copyright 2011-2021 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
.container,
.container-fluid,
.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm {
  width: 100%;
/*  padding-right: var(--bs-gutter-x, 0.75rem);
  padding-left: var(--bs-gutter-x, 0.75rem);*/
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container-sm, .container {
    max-width: 540px;
  }
}
@media (min-width: 768px) {
  .container-md, .container-sm, .container {
    max-width: 720px;
  }
}
@media (min-width: 992px) {
  .container-lg, .container-md, .container-sm, .container {
    max-width: 960px;
  }
}
@media (min-width: 1200px) {
  .container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 1140px;
  }
}
@media (min-width: 1400px) {
  .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 1140px;
  }
}
.row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(var(--bs-gutter-y) * -1);
  margin-right: calc(var(--bs-gutter-x) / -2);
  margin-left: calc(var(--bs-gutter-x) / -2);
}
.row > * {
  box-sizing: border-box;
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(var(--bs-gutter-x) / 2);
  padding-left: calc(var(--bs-gutter-x) / 2);
  margin-top: var(--bs-gutter-y);
}

.col {
  flex: 1 0 0%;
}

.row-cols-auto > * {
  flex: 0 0 auto;
  width: auto;
}

.row-cols-1 > * {
  flex: 0 0 auto;
  width: 100%;
}

.row-cols-2 > * {
  flex: 0 0 auto;
  width: 50%;
}

.row-cols-3 > * {
  flex: 0 0 auto;
  width: 33.3333333333%;
}

.row-cols-4 > * {
  flex: 0 0 auto;
  width: 25%;
}

.row-cols-5 > * {
  flex: 0 0 auto;
  width: 20%;
}

.row-cols-6 > * {
  flex: 0 0 auto;
  width: 16.6666666667%;
}

.col-auto {
  flex: 0 0 auto;
  width: auto;
}

.col-1 {
  flex: 0 0 auto;
  width: 8.3333333333%;
}

.col-2 {
  flex: 0 0 auto;
  width: 16.6666666667%;
}

.col-3 {
  flex: 0 0 auto;
  width: 25%;
}

.col-4 {
  flex: 0 0 auto;
  width: 33.3333333333%;
}

.col-5 {
  flex: 0 0 auto;
  width: 41.6666666667%;
}

.col-6 {
  flex: 0 0 auto;
  width: 50%;
}

.col-7 {
  flex: 0 0 auto;
  width: 58.3333333333%;
}

.col-8 {
  flex: 0 0 auto;
  width: 66.6666666667%;
}

.col-9 {
  flex: 0 0 auto;
  width: 75%;
}

.col-10 {
  flex: 0 0 auto;
  width: 83.3333333333%;
}

.col-11 {
  flex: 0 0 auto;
  width: 91.6666666667%;
}

.col-12 {
  flex: 0 0 auto;
  width: 100%;
}

.offset-1 {
  margin-left: 8.3333333333%;
}

.offset-2 {
  margin-left: 16.6666666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.3333333333%;
}

.offset-5 {
  margin-left: 41.6666666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.3333333333%;
}

.offset-8 {
  margin-left: 66.6666666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.3333333333%;
}

.offset-11 {
  margin-left: 91.6666666667%;
}

.g-0,
.gx-0 {
  --bs-gutter-x: 0;
}

.g-0,
.gy-0 {
  --bs-gutter-y: 0;
}

.g-1,
.gx-1 {
  --bs-gutter-x: 0.25rem;
}

.g-1,
.gy-1 {
  --bs-gutter-y: 0.25rem;
}

.g-2,
.gx-2 {
  --bs-gutter-x: 0.5rem;
}

.g-2,
.gy-2 {
  --bs-gutter-y: 0.5rem;
}

.g-3,
.gx-3 {
  --bs-gutter-x: 1rem;
}

.g-3,
.gy-3 {
  --bs-gutter-y: 1rem;
}

.g-4,
.gx-4 {
  --bs-gutter-x: 1.5rem;
}

.g-4,
.gy-4 {
  --bs-gutter-y: 1.5rem;
}

.g-5,
.gx-5 {
  --bs-gutter-x: 3rem;
}

.g-5,
.gy-5 {
  --bs-gutter-y: 3rem;
}

@media (min-width: 576px) {
  .col-sm {
    flex: 1 0 0%;
  }

  .row-cols-sm-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-sm-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-sm-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-sm-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-sm-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-sm-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-sm-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-sm-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-sm-1 {
    flex: 0 0 auto;
    width: 8.3333333333%;
  }

  .col-sm-2 {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-sm-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-sm-4 {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .col-sm-5 {
    flex: 0 0 auto;
    width: 41.6666666667%;
  }

  .col-sm-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-sm-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }

  .col-sm-8 {
    flex: 0 0 auto;
    width: 66.6666666667%;
  }

  .col-sm-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-sm-10 {
    flex: 0 0 auto;
    width: 83.3333333333%;
  }

  .col-sm-11 {
    flex: 0 0 auto;
    width: 91.6666666667%;
  }

  .col-sm-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-sm-0 {
    margin-left: 0;
  }

  .offset-sm-1 {
    margin-left: 8.3333333333%;
  }

  .offset-sm-2 {
    margin-left: 16.6666666667%;
  }

  .offset-sm-3 {
    margin-left: 25%;
  }

  .offset-sm-4 {
    margin-left: 33.3333333333%;
  }

  .offset-sm-5 {
    margin-left: 41.6666666667%;
  }

  .offset-sm-6 {
    margin-left: 50%;
  }

  .offset-sm-7 {
    margin-left: 58.3333333333%;
  }

  .offset-sm-8 {
    margin-left: 66.6666666667%;
  }

  .offset-sm-9 {
    margin-left: 75%;
  }

  .offset-sm-10 {
    margin-left: 83.3333333333%;
  }

  .offset-sm-11 {
    margin-left: 91.6666666667%;
  }

  .g-sm-0,
.gx-sm-0 {
    --bs-gutter-x: 0;
  }

  .g-sm-0,
.gy-sm-0 {
    --bs-gutter-y: 0;
  }

  .g-sm-1,
.gx-sm-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-sm-1,
.gy-sm-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-sm-2,
.gx-sm-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-sm-2,
.gy-sm-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-sm-3,
.gx-sm-3 {
    --bs-gutter-x: 1rem;
  }

  .g-sm-3,
.gy-sm-3 {
    --bs-gutter-y: 1rem;
  }

  .g-sm-4,
.gx-sm-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-sm-4,
.gy-sm-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-sm-5,
.gx-sm-5 {
    --bs-gutter-x: 3rem;
  }

  .g-sm-5,
.gy-sm-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 768px) {
  .col-md {
    flex: 1 0 0%;
  }

  .row-cols-md-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-md-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-md-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-md-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-md-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-md-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-md-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-md-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-md-1 {
    flex: 0 0 auto;
    width: 8.3333333333%;
  }

  .col-md-2 {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-md-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-md-4 {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .col-md-5 {
    flex: 0 0 auto;
    width: 41.6666666667%;
  }

  .col-md-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-md-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }

  .col-md-8 {
    flex: 0 0 auto;
    width: 66.6666666667%;
  }

  .col-md-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-md-10 {
    flex: 0 0 auto;
    width: 83.3333333333%;
  }

  .col-md-11 {
    flex: 0 0 auto;
    width: 91.6666666667%;
  }

  .col-md-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-md-0 {
    margin-left: 0;
  }

  .offset-md-1 {
    margin-left: 8.3333333333%;
  }

  .offset-md-2 {
    margin-left: 16.6666666667%;
  }

  .offset-md-3 {
    margin-left: 25%;
  }

  .offset-md-4 {
    margin-left: 33.3333333333%;
  }

  .offset-md-5 {
    margin-left: 41.6666666667%;
  }

  .offset-md-6 {
    margin-left: 50%;
  }

  .offset-md-7 {
    margin-left: 58.3333333333%;
  }

  .offset-md-8 {
    margin-left: 66.6666666667%;
  }

  .offset-md-9 {
    margin-left: 75%;
  }

  .offset-md-10 {
    margin-left: 83.3333333333%;
  }

  .offset-md-11 {
    margin-left: 91.6666666667%;
  }

  .g-md-0,
.gx-md-0 {
    --bs-gutter-x: 0;
  }

  .g-md-0,
.gy-md-0 {
    --bs-gutter-y: 0;
  }

  .g-md-1,
.gx-md-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-md-1,
.gy-md-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-md-2,
.gx-md-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-md-2,
.gy-md-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-md-3,
.gx-md-3 {
    --bs-gutter-x: 1rem;
  }

  .g-md-3,
.gy-md-3 {
    --bs-gutter-y: 1rem;
  }

  .g-md-4,
.gx-md-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-md-4,
.gy-md-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-md-5,
.gx-md-5 {
    --bs-gutter-x: 3rem;
  }

  .g-md-5,
.gy-md-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 992px) {
  .col-lg {
    flex: 1 0 0%;
  }

  .row-cols-lg-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-lg-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-lg-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-lg-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-lg-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-lg-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-lg-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-lg-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-lg-1 {
    flex: 0 0 auto;
    width: 8.3333333333%;
  }

  .col-lg-2 {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-lg-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-lg-4 {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .col-lg-5 {
    flex: 0 0 auto;
    width: 41.6666666667%;
  }

  .col-lg-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-lg-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }

  .col-lg-8 {
    flex: 0 0 auto;
    width: 66.6666666667%;
  }

  .col-lg-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-lg-10 {
    flex: 0 0 auto;
    width: 83.3333333333%;
  }

  .col-lg-11 {
    flex: 0 0 auto;
    width: 91.6666666667%;
  }

  .col-lg-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-lg-0 {
    margin-left: 0;
  }

  .offset-lg-1 {
    margin-left: 8.3333333333%;
  }

  .offset-lg-2 {
    margin-left: 16.6666666667%;
  }

  .offset-lg-3 {
    margin-left: 25%;
  }

  .offset-lg-4 {
    margin-left: 33.3333333333%;
  }

  .offset-lg-5 {
    margin-left: 41.6666666667%;
  }

  .offset-lg-6 {
    margin-left: 50%;
  }

  .offset-lg-7 {
    margin-left: 58.3333333333%;
  }

  .offset-lg-8 {
    margin-left: 66.6666666667%;
  }

  .offset-lg-9 {
    margin-left: 75%;
  }

  .offset-lg-10 {
    margin-left: 83.3333333333%;
  }

  .offset-lg-11 {
    margin-left: 91.6666666667%;
  }

  .g-lg-0,
.gx-lg-0 {
    --bs-gutter-x: 0;
  }

  .g-lg-0,
.gy-lg-0 {
    --bs-gutter-y: 0;
  }

  .g-lg-1,
.gx-lg-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-lg-1,
.gy-lg-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-lg-2,
.gx-lg-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-lg-2,
.gy-lg-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-lg-3,
.gx-lg-3 {
    --bs-gutter-x: 1rem;
  }

  .g-lg-3,
.gy-lg-3 {
    --bs-gutter-y: 1rem;
  }

  .g-lg-4,
.gx-lg-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-lg-4,
.gy-lg-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-lg-5,
.gx-lg-5 {
    --bs-gutter-x: 3rem;
  }

  .g-lg-5,
.gy-lg-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 1200px) {
  .col-xl {
    flex: 1 0 0%;
  }

  .row-cols-xl-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-xl-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-xl-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-xl-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-xl-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-xl-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-xl-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xl-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-xl-1 {
    flex: 0 0 auto;
    width: 8.3333333333%;
  }

  .col-xl-2 {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xl-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-xl-4 {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .col-xl-5 {
    flex: 0 0 auto;
    width: 41.6666666667%;
  }

  .col-xl-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-xl-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }

  .col-xl-8 {
    flex: 0 0 auto;
    width: 66.6666666667%;
  }

  .col-xl-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-xl-10 {
    flex: 0 0 auto;
    width: 83.3333333333%;
  }

  .col-xl-11 {
    flex: 0 0 auto;
    width: 91.6666666667%;
  }

  .col-xl-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-xl-0 {
    margin-left: 0;
  }

  .offset-xl-1 {
    margin-left: 8.3333333333%;
  }

  .offset-xl-2 {
    margin-left: 16.6666666667%;
  }

  .offset-xl-3 {
    margin-left: 25%;
  }

  .offset-xl-4 {
    margin-left: 33.3333333333%;
  }

  .offset-xl-5 {
    margin-left: 41.6666666667%;
  }

  .offset-xl-6 {
    margin-left: 50%;
  }

  .offset-xl-7 {
    margin-left: 58.3333333333%;
  }

  .offset-xl-8 {
    margin-left: 66.6666666667%;
  }

  .offset-xl-9 {
    margin-left: 75%;
  }

  .offset-xl-10 {
    margin-left: 83.3333333333%;
  }

  .offset-xl-11 {
    margin-left: 91.6666666667%;
  }

  .g-xl-0,
.gx-xl-0 {
    --bs-gutter-x: 0;
  }

  .g-xl-0,
.gy-xl-0 {
    --bs-gutter-y: 0;
  }

  .g-xl-1,
.gx-xl-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-xl-1,
.gy-xl-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-xl-2,
.gx-xl-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-xl-2,
.gy-xl-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-xl-3,
.gx-xl-3 {
    --bs-gutter-x: 1rem;
  }

  .g-xl-3,
.gy-xl-3 {
    --bs-gutter-y: 1rem;
  }

  .g-xl-4,
.gx-xl-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-xl-4,
.gy-xl-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-xl-5,
.gx-xl-5 {
    --bs-gutter-x: 3rem;
  }

  .g-xl-5,
.gy-xl-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 1400px) {
  .col-xxl {
    flex: 1 0 0%;
  }

  .row-cols-xxl-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-xxl-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-xxl-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-xxl-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-xxl-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-xxl-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-xxl-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xxl-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-xxl-1 {
    flex: 0 0 auto;
    width: 8.3333333333%;
  }

  .col-xxl-2 {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xxl-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-xxl-4 {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .col-xxl-5 {
    flex: 0 0 auto;
    width: 41.6666666667%;
  }

  .col-xxl-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-xxl-7 {
    flex: 0 0 auto;
    width: 58.3333333333%;
  }

  .col-xxl-8 {
    flex: 0 0 auto;
    width: 66.6666666667%;
  }

  .col-xxl-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-xxl-10 {
    flex: 0 0 auto;
    width: 83.3333333333%;
  }

  .col-xxl-11 {
    flex: 0 0 auto;
    width: 91.6666666667%;
  }

  .col-xxl-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-xxl-0 {
    margin-left: 0;
  }

  .offset-xxl-1 {
    margin-left: 8.3333333333%;
  }

  .offset-xxl-2 {
    margin-left: 16.6666666667%;
  }

  .offset-xxl-3 {
    margin-left: 25%;
  }

  .offset-xxl-4 {
    margin-left: 33.3333333333%;
  }

  .offset-xxl-5 {
    margin-left: 41.6666666667%;
  }

  .offset-xxl-6 {
    margin-left: 50%;
  }

  .offset-xxl-7 {
    margin-left: 58.3333333333%;
  }

  .offset-xxl-8 {
    margin-left: 66.6666666667%;
  }

  .offset-xxl-9 {
    margin-left: 75%;
  }

  .offset-xxl-10 {
    margin-left: 83.3333333333%;
  }

  .offset-xxl-11 {
    margin-left: 91.6666666667%;
  }

  .g-xxl-0,
.gx-xxl-0 {
    --bs-gutter-x: 0;
  }

  .g-xxl-0,
.gy-xxl-0 {
    --bs-gutter-y: 0;
  }

  .g-xxl-1,
.gx-xxl-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-xxl-1,
.gy-xxl-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-xxl-2,
.gx-xxl-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-xxl-2,
.gy-xxl-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-xxl-3,
.gx-xxl-3 {
    --bs-gutter-x: 1rem;
  }

  .g-xxl-3,
.gy-xxl-3 {
    --bs-gutter-y: 1rem;
  }

  .g-xxl-4,
.gx-xxl-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-xxl-4,
.gy-xxl-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-xxl-5,
.gx-xxl-5 {
    --bs-gutter-x: 3rem;
  }

  .g-xxl-5,
.gy-xxl-5 {
    --bs-gutter-y: 3rem;
  }
}
.d-inline {
  display: inline !important;
}

.d-inline-block {
  display: inline-block !important;
}

.d-block {
  display: block !important;
}

.d-grid {
  display: grid !important;
}

.d-table {
  display: table !important;
}

.d-table-row {
  display: table-row !important;
}

.d-table-cell {
  display: table-cell !important;
}

.d-flex {
  display: flex !important;
}

.d-inline-flex {
  display: inline-flex !important;
}

.d-none {
  display: none !important;
}

.flex-fill {
  flex: 1 1 auto !important;
}

.flex-row {
  flex-direction: row !important;
}

.flex-column {
  flex-direction: column !important;
}

.flex-row-reverse {
  flex-direction: row-reverse !important;
}

.flex-column-reverse {
  flex-direction: column-reverse !important;
}

.flex-grow-0 {
  flex-grow: 0 !important;
}

.flex-grow-1 {
  flex-grow: 1 !important;
}

.flex-shrink-0 {
  flex-shrink: 0 !important;
}

.flex-shrink-1 {
  flex-shrink: 1 !important;
}

.flex-wrap {
  flex-wrap: wrap !important;
}

.flex-nowrap {
  flex-wrap: nowrap !important;
}

.flex-wrap-reverse {
  flex-wrap: wrap-reverse !important;
}

.justify-content-start {
  justify-content: flex-start !important;
}

.justify-content-end {
  justify-content: flex-end !important;
}

.justify-content-center {
  justify-content: center !important;
}

.justify-content-between {
  justify-content: space-between !important;
}

.justify-content-around {
  justify-content: space-around !important;
}

.justify-content-evenly {
  justify-content: space-evenly !important;
}

.align-items-start {
  align-items: flex-start !important;
}

.align-items-end {
  align-items: flex-end !important;
}

.align-items-center {
  align-items: center !important;
}

.align-items-baseline {
  align-items: baseline !important;
}

.align-items-stretch {
  align-items: stretch !important;
}

.align-content-start {
  align-content: flex-start !important;
}

.align-content-end {
  align-content: flex-end !important;
}

.align-content-center {
  align-content: center !important;
}

.align-content-between {
  align-content: space-between !important;
}

.align-content-around {
  align-content: space-around !important;
}

.align-content-stretch {
  align-content: stretch !important;
}

.align-self-auto {
  align-self: auto !important;
}

.align-self-start {
  align-self: flex-start !important;
}

.align-self-end {
  align-self: flex-end !important;
}

.align-self-center {
  align-self: center !important;
}

.align-self-baseline {
  align-self: baseline !important;
}

.align-self-stretch {
  align-self: stretch !important;
}

.order-first {
  order: -1 !important;
}

.order-0 {
  order: 0 !important;
}

.order-1 {
  order: 1 !important;
}

.order-2 {
  order: 2 !important;
}

.order-3 {
  order: 3 !important;
}

.order-4 {
  order: 4 !important;
}

.order-5 {
  order: 5 !important;
}

.order-last {
  order: 6 !important;
}

.m-0 {
  margin: 0 !important;
}

.m-1 {
  margin: 0.25rem !important;
}

.m-2 {
  margin: 0.5rem !important;
}

.m-3 {
  margin: 1rem !important;
}

.m-4 {
  margin: 1.5rem !important;
}

.m-5 {
  margin: 3rem !important;
}

.m-auto {
  margin: auto !important;
}

.mx-0 {
  margin-right: 0 !important;
  margin-left: 0 !important;
}

.mx-1 {
  margin-right: 0.25rem !important;
  margin-left: 0.25rem !important;
}

.mx-2 {
  margin-right: 0.5rem !important;
  margin-left: 0.5rem !important;
}

.mx-3 {
  margin-right: 1rem !important;
  margin-left: 1rem !important;
}

.mx-4 {
  margin-right: 1.5rem !important;
  margin-left: 1.5rem !important;
}

.mx-5 {
  margin-right: 3rem !important;
  margin-left: 3rem !important;
}

.mx-auto {
  margin-right: auto !important;
  margin-left: auto !important;
}

.my-0 {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}

.my-1 {
  margin-top: 0.25rem !important;
  margin-bottom: 0.25rem !important;
}

.my-2 {
  margin-top: 0.5rem !important;
  margin-bottom: 0.5rem !important;
}

.my-3 {
  margin-top: 1rem !important;
  margin-bottom: 1rem !important;
}

.my-4 {
  margin-top: 1.5rem !important;
  margin-bottom: 1.5rem !important;
}

.my-5 {
  margin-top: 3rem !important;
  margin-bottom: 3rem !important;
}

.my-auto {
  margin-top: auto !important;
  margin-bottom: auto !important;
}

.mt-0 {
  margin-top: 0 !important;
}

.mt-1 {
  margin-top: 0.25rem !important;
}

.mt-2 {
  margin-top: 0.5rem !important;
}

.mt-3 {
  margin-top: 1rem !important;
}

.mt-4 {
  margin-top: 1.5rem !important;
}

.mt-5 {
  margin-top: 3rem !important;
}

.mt-auto {
  margin-top: auto !important;
}

.me-0 {
  margin-right: 0 !important;
}

.me-1 {
  margin-right: 0.25rem !important;
}

.me-2 {
  margin-right: 0.5rem !important;
}

.me-3 {
  margin-right: 1rem !important;
}

.me-4 {
  margin-right: 1.5rem !important;
}

.me-5 {
  margin-right: 3rem !important;
}

.me-auto {
  margin-right: auto !important;
}

.mb-0 {
  margin-bottom: 0 !important;
}

.mb-1 {
  margin-bottom: 0.25rem !important;
}

.mb-2 {
  margin-bottom: 0.5rem !important;
}

.mb-3 {
  margin-bottom: 1rem !important;
}

.mb-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 3rem !important;
}

.mb-auto {
  margin-bottom: auto !important;
}

.ms-0 {
  margin-left: 0 !important;
}

.ms-1 {
  margin-left: 0.25rem !important;
}

.ms-2 {
  margin-left: 0.5rem !important;
}

.ms-3 {
  margin-left: 1rem !important;
}

.ms-4 {
  margin-left: 1.5rem !important;
}

.ms-5 {
  margin-left: 3rem !important;
}

.ms-auto {
  margin-left: auto !important;
}

.p-0 {
  padding: 0 !important;
}

.p-1 {
  padding: 0.25rem !important;
}

.p-2 {
  padding: 0.5rem !important;
}

.p-3 {
  padding: 1rem !important;
}

.p-4 {
  padding: 1.5rem !important;
}

.p-5 {
  padding: 3rem !important;
}

.px-0 {
  padding-right: 0 !important;
  padding-left: 0 !important;
}

.px-1 {
  padding-right: 0.25rem !important;
  padding-left: 0.25rem !important;
}

.px-2 {
  padding-right: 0.5rem !important;
  padding-left: 0.5rem !important;
}

.px-3 {
  padding-right: 1rem !important;
  padding-left: 1rem !important;
}

.px-4 {
  padding-right: 1.5rem !important;
  padding-left: 1.5rem !important;
}

.px-5 {
  padding-right: 3rem !important;
  padding-left: 3rem !important;
}

.py-0 {
  padding-top: 0 !important;
  padding-bottom: 0 !important;
}

.py-1 {
  padding-top: 0.25rem !important;
  padding-bottom: 0.25rem !important;
}

.py-2 {
  padding-top: 0.5rem !important;
  padding-bottom: 0.5rem !important;
}

.py-3 {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}

.py-4 {
  padding-top: 1.5rem !important;
  padding-bottom: 1.5rem !important;
}

.py-5 {
  padding-top: 3rem !important;
  padding-bottom: 3rem !important;
}

.pt-0 {
  padding-top: 0 !important;
}

.pt-1 {
  padding-top: 0.25rem !important;
}

.pt-2 {
  padding-top: 0.5rem !important;
}

.pt-3 {
  padding-top: 1rem !important;
}

.pt-4 {
  padding-top: 1.5rem !important;
}

.pt-5 {
  padding-top: 3rem !important;
}

.pe-0 {
  padding-right: 0 !important;
}

.pe-1 {
  padding-right: 0.25rem !important;
}

.pe-2 {
  padding-right: 0.5rem !important;
}

.pe-3 {
  padding-right: 1rem !important;
}

.pe-4 {
  padding-right: 1.5rem !important;
}

.pe-5 {
  padding-right: 3rem !important;
}

.pb-0 {
  padding-bottom: 0 !important;
}

.pb-1 {
  padding-bottom: 0.25rem !important;
}

.pb-2 {
  padding-bottom: 0.5rem !important;
}

.pb-3 {
  padding-bottom: 1rem !important;
}

.pb-4 {
  padding-bottom: 1.5rem !important;
}

.pb-5 {
  padding-bottom: 3rem !important;
}

.ps-0 {
  padding-left: 0 !important;
}

.ps-1 {
  padding-left: 0.25rem !important;
}

.ps-2 {
  padding-left: 0.5rem !important;
}

.ps-3 {
  padding-left: 1rem !important;
}

.ps-4 {
  padding-left: 1.5rem !important;
}

.ps-5 {
  padding-left: 3rem !important;
}

@media (min-width: 576px) {
  .d-sm-inline {
    display: inline !important;
  }

  .d-sm-inline-block {
    display: inline-block !important;
  }

  .d-sm-block {
    display: block !important;
  }

  .d-sm-grid {
    display: grid !important;
  }

  .d-sm-table {
    display: table !important;
  }

  .d-sm-table-row {
    display: table-row !important;
  }

  .d-sm-table-cell {
    display: table-cell !important;
  }

  .d-sm-flex {
    display: flex !important;
  }

  .d-sm-inline-flex {
    display: inline-flex !important;
  }

  .d-sm-none {
    display: none !important;
  }

  .flex-sm-fill {
    flex: 1 1 auto !important;
  }

  .flex-sm-row {
    flex-direction: row !important;
  }

  .flex-sm-column {
    flex-direction: column !important;
  }

  .flex-sm-row-reverse {
    flex-direction: row-reverse !important;
  }

  .flex-sm-column-reverse {
    flex-direction: column-reverse !important;
  }

  .flex-sm-grow-0 {
    flex-grow: 0 !important;
  }

  .flex-sm-grow-1 {
    flex-grow: 1 !important;
  }

  .flex-sm-shrink-0 {
    flex-shrink: 0 !important;
  }

  .flex-sm-shrink-1 {
    flex-shrink: 1 !important;
  }

  .flex-sm-wrap {
    flex-wrap: wrap !important;
  }

  .flex-sm-nowrap {
    flex-wrap: nowrap !important;
  }

  .flex-sm-wrap-reverse {
    flex-wrap: wrap-reverse !important;
  }

  .justify-content-sm-start {
    justify-content: flex-start !important;
  }

  .justify-content-sm-end {
    justify-content: flex-end !important;
  }

  .justify-content-sm-center {
    justify-content: center !important;
  }

  .justify-content-sm-between {
    justify-content: space-between !important;
  }

  .justify-content-sm-around {
    justify-content: space-around !important;
  }

  .justify-content-sm-evenly {
    justify-content: space-evenly !important;
  }

  .align-items-sm-start {
    align-items: flex-start !important;
  }

  .align-items-sm-end {
    align-items: flex-end !important;
  }

  .align-items-sm-center {
    align-items: center !important;
  }

  .align-items-sm-baseline {
    align-items: baseline !important;
  }

  .align-items-sm-stretch {
    align-items: stretch !important;
  }

  .align-content-sm-start {
    align-content: flex-start !important;
  }

  .align-content-sm-end {
    align-content: flex-end !important;
  }

  .align-content-sm-center {
    align-content: center !important;
  }

  .align-content-sm-between {
    align-content: space-between !important;
  }

  .align-content-sm-around {
    align-content: space-around !important;
  }

  .align-content-sm-stretch {
    align-content: stretch !important;
  }

  .align-self-sm-auto {
    align-self: auto !important;
  }

  .align-self-sm-start {
    align-self: flex-start !important;
  }

  .align-self-sm-end {
    align-self: flex-end !important;
  }

  .align-self-sm-center {
    align-self: center !important;
  }

  .align-self-sm-baseline {
    align-self: baseline !important;
  }

  .align-self-sm-stretch {
    align-self: stretch !important;
  }

  .order-sm-first {
    order: -1 !important;
  }

  .order-sm-0 {
    order: 0 !important;
  }

  .order-sm-1 {
    order: 1 !important;
  }

  .order-sm-2 {
    order: 2 !important;
  }

  .order-sm-3 {
    order: 3 !important;
  }

  .order-sm-4 {
    order: 4 !important;
  }

  .order-sm-5 {
    order: 5 !important;
  }

  .order-sm-last {
    order: 6 !important;
  }

  .m-sm-0 {
    margin: 0 !important;
  }

  .m-sm-1 {
    margin: 0.25rem !important;
  }

  .m-sm-2 {
    margin: 0.5rem !important;
  }

  .m-sm-3 {
    margin: 1rem !important;
  }

  .m-sm-4 {
    margin: 1.5rem !important;
  }

  .m-sm-5 {
    margin: 3rem !important;
  }

  .m-sm-auto {
    margin: auto !important;
  }

  .mx-sm-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

  .mx-sm-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
  }

  .mx-sm-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
  }

  .mx-sm-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
  }

  .mx-sm-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
  }

  .mx-sm-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
  }

  .mx-sm-auto {
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .my-sm-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .my-sm-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
  }

  .my-sm-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }

  .my-sm-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
  }

  .my-sm-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
  }

  .my-sm-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }

  .my-sm-auto {
    margin-top: auto !important;
    margin-bottom: auto !important;
  }

  .mt-sm-0 {
    margin-top: 0 !important;
  }

  .mt-sm-1 {
    margin-top: 0.25rem !important;
  }

  .mt-sm-2 {
    margin-top: 0.5rem !important;
  }

  .mt-sm-3 {
    margin-top: 1rem !important;
  }

  .mt-sm-4 {
    margin-top: 1.5rem !important;
  }

  .mt-sm-5 {
    margin-top: 3rem !important;
  }

  .mt-sm-auto {
    margin-top: auto !important;
  }

  .me-sm-0 {
    margin-right: 0 !important;
  }

  .me-sm-1 {
    margin-right: 0.25rem !important;
  }

  .me-sm-2 {
    margin-right: 0.5rem !important;
  }

  .me-sm-3 {
    margin-right: 1rem !important;
  }

  .me-sm-4 {
    margin-right: 1.5rem !important;
  }

  .me-sm-5 {
    margin-right: 3rem !important;
  }

  .me-sm-auto {
    margin-right: auto !important;
  }

  .mb-sm-0 {
    margin-bottom: 0 !important;
  }

  .mb-sm-1 {
    margin-bottom: 0.25rem !important;
  }

  .mb-sm-2 {
    margin-bottom: 0.5rem !important;
  }

  .mb-sm-3 {
    margin-bottom: 1rem !important;
  }

  .mb-sm-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-sm-5 {
    margin-bottom: 3rem !important;
  }

  .mb-sm-auto {
    margin-bottom: auto !important;
  }

  .ms-sm-0 {
    margin-left: 0 !important;
  }

  .ms-sm-1 {
    margin-left: 0.25rem !important;
  }

  .ms-sm-2 {
    margin-left: 0.5rem !important;
  }

  .ms-sm-3 {
    margin-left: 1rem !important;
  }

  .ms-sm-4 {
    margin-left: 1.5rem !important;
  }

  .ms-sm-5 {
    margin-left: 3rem !important;
  }

  .ms-sm-auto {
    margin-left: auto !important;
  }

  .p-sm-0 {
    padding: 0 !important;
  }

  .p-sm-1 {
    padding: 0.25rem !important;
  }

  .p-sm-2 {
    padding: 0.5rem !important;
  }

  .p-sm-3 {
    padding: 1rem !important;
  }

  .p-sm-4 {
    padding: 1.5rem !important;
  }

  .p-sm-5 {
    padding: 3rem !important;
  }

  .px-sm-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  .px-sm-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
  }

  .px-sm-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
  }

  .px-sm-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }

  .px-sm-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
  }

  .px-sm-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
  }

  .py-sm-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
  }

  .py-sm-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
  }

  .py-sm-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }

  .py-sm-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
  }

  .py-sm-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
  }

  .py-sm-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
  }

  .pt-sm-0 {
    padding-top: 0 !important;
  }

  .pt-sm-1 {
    padding-top: 0.25rem !important;
  }

  .pt-sm-2 {
    padding-top: 0.5rem !important;
  }

  .pt-sm-3 {
    padding-top: 1rem !important;
  }

  .pt-sm-4 {
    padding-top: 1.5rem !important;
  }

  .pt-sm-5 {
    padding-top: 3rem !important;
  }

  .pe-sm-0 {
    padding-right: 0 !important;
  }

  .pe-sm-1 {
    padding-right: 0.25rem !important;
  }

  .pe-sm-2 {
    padding-right: 0.5rem !important;
  }

  .pe-sm-3 {
    padding-right: 1rem !important;
  }

  .pe-sm-4 {
    padding-right: 1.5rem !important;
  }

  .pe-sm-5 {
    padding-right: 3rem !important;
  }

  .pb-sm-0 {
    padding-bottom: 0 !important;
  }

  .pb-sm-1 {
    padding-bottom: 0.25rem !important;
  }

  .pb-sm-2 {
    padding-bottom: 0.5rem !important;
  }

  .pb-sm-3 {
    padding-bottom: 1rem !important;
  }

  .pb-sm-4 {
    padding-bottom: 1.5rem !important;
  }

  .pb-sm-5 {
    padding-bottom: 3rem !important;
  }

  .ps-sm-0 {
    padding-left: 0 !important;
  }

  .ps-sm-1 {
    padding-left: 0.25rem !important;
  }

  .ps-sm-2 {
    padding-left: 0.5rem !important;
  }

  .ps-sm-3 {
    padding-left: 1rem !important;
  }

  .ps-sm-4 {
    padding-left: 1.5rem !important;
  }

  .ps-sm-5 {
    padding-left: 3rem !important;
  }
}
@media (min-width: 768px) {
  .d-md-inline {
    display: inline !important;
  }

  .d-md-inline-block {
    display: inline-block !important;
  }

  .d-md-block {
    display: block !important;
  }

  .d-md-grid {
    display: grid !important;
  }

  .d-md-table {
    display: table !important;
  }

  .d-md-table-row {
    display: table-row !important;
  }

  .d-md-table-cell {
    display: table-cell !important;
  }

  .d-md-flex {
    display: flex !important;
  }

  .d-md-inline-flex {
    display: inline-flex !important;
  }

  .d-md-none {
    display: none !important;
  }

  .flex-md-fill {
    flex: 1 1 auto !important;
  }

  .flex-md-row {
    flex-direction: row !important;
  }

  .flex-md-column {
    flex-direction: column !important;
  }

  .flex-md-row-reverse {
    flex-direction: row-reverse !important;
  }

  .flex-md-column-reverse {
    flex-direction: column-reverse !important;
  }

  .flex-md-grow-0 {
    flex-grow: 0 !important;
  }

  .flex-md-grow-1 {
    flex-grow: 1 !important;
  }

  .flex-md-shrink-0 {
    flex-shrink: 0 !important;
  }

  .flex-md-shrink-1 {
    flex-shrink: 1 !important;
  }

  .flex-md-wrap {
    flex-wrap: wrap !important;
  }

  .flex-md-nowrap {
    flex-wrap: nowrap !important;
  }

  .flex-md-wrap-reverse {
    flex-wrap: wrap-reverse !important;
  }

  .justify-content-md-start {
    justify-content: flex-start !important;
  }

  .justify-content-md-end {
    justify-content: flex-end !important;
  }

  .justify-content-md-center {
    justify-content: center !important;
  }

  .justify-content-md-between {
    justify-content: space-between !important;
  }

  .justify-content-md-around {
    justify-content: space-around !important;
  }

  .justify-content-md-evenly {
    justify-content: space-evenly !important;
  }

  .align-items-md-start {
    align-items: flex-start !important;
  }

  .align-items-md-end {
    align-items: flex-end !important;
  }

  .align-items-md-center {
    align-items: center !important;
  }

  .align-items-md-baseline {
    align-items: baseline !important;
  }

  .align-items-md-stretch {
    align-items: stretch !important;
  }

  .align-content-md-start {
    align-content: flex-start !important;
  }

  .align-content-md-end {
    align-content: flex-end !important;
  }

  .align-content-md-center {
    align-content: center !important;
  }

  .align-content-md-between {
    align-content: space-between !important;
  }

  .align-content-md-around {
    align-content: space-around !important;
  }

  .align-content-md-stretch {
    align-content: stretch !important;
  }

  .align-self-md-auto {
    align-self: auto !important;
  }

  .align-self-md-start {
    align-self: flex-start !important;
  }

  .align-self-md-end {
    align-self: flex-end !important;
  }

  .align-self-md-center {
    align-self: center !important;
  }

  .align-self-md-baseline {
    align-self: baseline !important;
  }

  .align-self-md-stretch {
    align-self: stretch !important;
  }

  .order-md-first {
    order: -1 !important;
  }

  .order-md-0 {
    order: 0 !important;
  }

  .order-md-1 {
    order: 1 !important;
  }

  .order-md-2 {
    order: 2 !important;
  }

  .order-md-3 {
    order: 3 !important;
  }

  .order-md-4 {
    order: 4 !important;
  }

  .order-md-5 {
    order: 5 !important;
  }

  .order-md-last {
    order: 6 !important;
  }

  .m-md-0 {
    margin: 0 !important;
  }

  .m-md-1 {
    margin: 0.25rem !important;
  }

  .m-md-2 {
    margin: 0.5rem !important;
  }

  .m-md-3 {
    margin: 1rem !important;
  }

  .m-md-4 {
    margin: 1.5rem !important;
  }

  .m-md-5 {
    margin: 3rem !important;
  }

  .m-md-auto {
    margin: auto !important;
  }

  .mx-md-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

  .mx-md-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
  }

  .mx-md-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
  }

  .mx-md-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
  }

  .mx-md-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
  }

  .mx-md-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
  }

  .mx-md-auto {
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .my-md-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .my-md-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
  }

  .my-md-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }

  .my-md-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
  }

  .my-md-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
  }

  .my-md-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }

  .my-md-auto {
    margin-top: auto !important;
    margin-bottom: auto !important;
  }

  .mt-md-0 {
    margin-top: 0 !important;
  }

  .mt-md-1 {
    margin-top: 0.25rem !important;
  }

  .mt-md-2 {
    margin-top: 0.5rem !important;
  }

  .mt-md-3 {
    margin-top: 1rem !important;
  }

  .mt-md-4 {
    margin-top: 1.5rem !important;
  }

  .mt-md-5 {
    margin-top: 3rem !important;
  }

  .mt-md-auto {
    margin-top: auto !important;
  }

  .me-md-0 {
    margin-right: 0 !important;
  }

  .me-md-1 {
    margin-right: 0.25rem !important;
  }

  .me-md-2 {
    margin-right: 0.5rem !important;
  }

  .me-md-3 {
    margin-right: 1rem !important;
  }

  .me-md-4 {
    margin-right: 1.5rem !important;
  }

  .me-md-5 {
    margin-right: 3rem !important;
  }

  .me-md-auto {
    margin-right: auto !important;
  }

  .mb-md-0 {
    margin-bottom: 0 !important;
  }

  .mb-md-1 {
    margin-bottom: 0.25rem !important;
  }

  .mb-md-2 {
    margin-bottom: 0.5rem !important;
  }

  .mb-md-3 {
    margin-bottom: 1rem !important;
  }

  .mb-md-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-md-5 {
    margin-bottom: 3rem !important;
  }

  .mb-md-auto {
    margin-bottom: auto !important;
  }

  .ms-md-0 {
    margin-left: 0 !important;
  }

  .ms-md-1 {
    margin-left: 0.25rem !important;
  }

  .ms-md-2 {
    margin-left: 0.5rem !important;
  }

  .ms-md-3 {
    margin-left: 1rem !important;
  }

  .ms-md-4 {
    margin-left: 1.5rem !important;
  }

  .ms-md-5 {
    margin-left: 3rem !important;
  }

  .ms-md-auto {
    margin-left: auto !important;
  }

  .p-md-0 {
    padding: 0 !important;
  }

  .p-md-1 {
    padding: 0.25rem !important;
  }

  .p-md-2 {
    padding: 0.5rem !important;
  }

  .p-md-3 {
    padding: 1rem !important;
  }

  .p-md-4 {
    padding: 1.5rem !important;
  }

  .p-md-5 {
    padding: 3rem !important;
  }

  .px-md-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  .px-md-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
  }

  .px-md-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
  }

  .px-md-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }

  .px-md-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
  }

  .px-md-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
  }

  .py-md-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
  }

  .py-md-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
  }

  .py-md-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }

  .py-md-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
  }

  .py-md-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
  }

  .py-md-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
  }

  .pt-md-0 {
    padding-top: 0 !important;
  }

  .pt-md-1 {
    padding-top: 0.25rem !important;
  }

  .pt-md-2 {
    padding-top: 0.5rem !important;
  }

  .pt-md-3 {
    padding-top: 1rem !important;
  }

  .pt-md-4 {
    padding-top: 1.5rem !important;
  }

  .pt-md-5 {
    padding-top: 3rem !important;
  }

  .pe-md-0 {
    padding-right: 0 !important;
  }

  .pe-md-1 {
    padding-right: 0.25rem !important;
  }

  .pe-md-2 {
    padding-right: 0.5rem !important;
  }

  .pe-md-3 {
    padding-right: 1rem !important;
  }

  .pe-md-4 {
    padding-right: 1.5rem !important;
  }

  .pe-md-5 {
    padding-right: 3rem !important;
  }

  .pb-md-0 {
    padding-bottom: 0 !important;
  }

  .pb-md-1 {
    padding-bottom: 0.25rem !important;
  }

  .pb-md-2 {
    padding-bottom: 0.5rem !important;
  }

  .pb-md-3 {
    padding-bottom: 1rem !important;
  }

  .pb-md-4 {
    padding-bottom: 1.5rem !important;
  }

  .pb-md-5 {
    padding-bottom: 3rem !important;
  }

  .ps-md-0 {
    padding-left: 0 !important;
  }

  .ps-md-1 {
    padding-left: 0.25rem !important;
  }

  .ps-md-2 {
    padding-left: 0.5rem !important;
  }

  .ps-md-3 {
    padding-left: 1rem !important;
  }

  .ps-md-4 {
    padding-left: 1.5rem !important;
  }

  .ps-md-5 {
    padding-left: 3rem !important;
  }
}
@media (min-width: 992px) {
  .d-lg-inline {
    display: inline !important;
  }

  .d-lg-inline-block {
    display: inline-block !important;
  }

  .d-lg-block {
    display: block !important;
  }

  .d-lg-grid {
    display: grid !important;
  }

  .d-lg-table {
    display: table !important;
  }

  .d-lg-table-row {
    display: table-row !important;
  }

  .d-lg-table-cell {
    display: table-cell !important;
  }

  .d-lg-flex {
    display: flex !important;
  }

  .d-lg-inline-flex {
    display: inline-flex !important;
  }

  .d-lg-none {
    display: none !important;
  }

  .flex-lg-fill {
    flex: 1 1 auto !important;
  }

  .flex-lg-row {
    flex-direction: row !important;
  }

  .flex-lg-column {
    flex-direction: column !important;
  }

  .flex-lg-row-reverse {
    flex-direction: row-reverse !important;
  }

  .flex-lg-column-reverse {
    flex-direction: column-reverse !important;
  }

  .flex-lg-grow-0 {
    flex-grow: 0 !important;
  }

  .flex-lg-grow-1 {
    flex-grow: 1 !important;
  }

  .flex-lg-shrink-0 {
    flex-shrink: 0 !important;
  }

  .flex-lg-shrink-1 {
    flex-shrink: 1 !important;
  }

  .flex-lg-wrap {
    flex-wrap: wrap !important;
  }

  .flex-lg-nowrap {
    flex-wrap: nowrap !important;
  }

  .flex-lg-wrap-reverse {
    flex-wrap: wrap-reverse !important;
  }

  .justify-content-lg-start {
    justify-content: flex-start !important;
  }

  .justify-content-lg-end {
    justify-content: flex-end !important;
  }

  .justify-content-lg-center {
    justify-content: center !important;
  }

  .justify-content-lg-between {
    justify-content: space-between !important;
  }

  .justify-content-lg-around {
    justify-content: space-around !important;
  }

  .justify-content-lg-evenly {
    justify-content: space-evenly !important;
  }

  .align-items-lg-start {
    align-items: flex-start !important;
  }

  .align-items-lg-end {
    align-items: flex-end !important;
  }

  .align-items-lg-center {
    align-items: center !important;
  }

  .align-items-lg-baseline {
    align-items: baseline !important;
  }

  .align-items-lg-stretch {
    align-items: stretch !important;
  }

  .align-content-lg-start {
    align-content: flex-start !important;
  }

  .align-content-lg-end {
    align-content: flex-end !important;
  }

  .align-content-lg-center {
    align-content: center !important;
  }

  .align-content-lg-between {
    align-content: space-between !important;
  }

  .align-content-lg-around {
    align-content: space-around !important;
  }

  .align-content-lg-stretch {
    align-content: stretch !important;
  }

  .align-self-lg-auto {
    align-self: auto !important;
  }

  .align-self-lg-start {
    align-self: flex-start !important;
  }

  .align-self-lg-end {
    align-self: flex-end !important;
  }

  .align-self-lg-center {
    align-self: center !important;
  }

  .align-self-lg-baseline {
    align-self: baseline !important;
  }

  .align-self-lg-stretch {
    align-self: stretch !important;
  }

  .order-lg-first {
    order: -1 !important;
  }

  .order-lg-0 {
    order: 0 !important;
  }

  .order-lg-1 {
    order: 1 !important;
  }

  .order-lg-2 {
    order: 2 !important;
  }

  .order-lg-3 {
    order: 3 !important;
  }

  .order-lg-4 {
    order: 4 !important;
  }

  .order-lg-5 {
    order: 5 !important;
  }

  .order-lg-last {
    order: 6 !important;
  }

  .m-lg-0 {
    margin: 0 !important;
  }

  .m-lg-1 {
    margin: 0.25rem !important;
  }

  .m-lg-2 {
    margin: 0.5rem !important;
  }

  .m-lg-3 {
    margin: 1rem !important;
  }

  .m-lg-4 {
    margin: 1.5rem !important;
  }

  .m-lg-5 {
    margin: 3rem !important;
  }

  .m-lg-auto {
    margin: auto !important;
  }

  .mx-lg-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

  .mx-lg-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
  }

  .mx-lg-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
  }

  .mx-lg-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
  }

  .mx-lg-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
  }

  .mx-lg-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
  }

  .mx-lg-auto {
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .my-lg-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .my-lg-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
  }

  .my-lg-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }

  .my-lg-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
  }

  .my-lg-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
  }

  .my-lg-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }

  .my-lg-auto {
    margin-top: auto !important;
    margin-bottom: auto !important;
  }

  .mt-lg-0 {
    margin-top: 0 !important;
  }

  .mt-lg-1 {
    margin-top: 0.25rem !important;
  }

  .mt-lg-2 {
    margin-top: 0.5rem !important;
  }

  .mt-lg-3 {
    margin-top: 1rem !important;
  }

  .mt-lg-4 {
    margin-top: 1.5rem !important;
  }

  .mt-lg-5 {
    margin-top: 3rem !important;
  }

  .mt-lg-auto {
    margin-top: auto !important;
  }

  .me-lg-0 {
    margin-right: 0 !important;
  }

  .me-lg-1 {
    margin-right: 0.25rem !important;
  }

  .me-lg-2 {
    margin-right: 0.5rem !important;
  }

  .me-lg-3 {
    margin-right: 1rem !important;
  }

  .me-lg-4 {
    margin-right: 1.5rem !important;
  }

  .me-lg-5 {
    margin-right: 3rem !important;
  }

  .me-lg-auto {
    margin-right: auto !important;
  }

  .mb-lg-0 {
    margin-bottom: 0 !important;
  }

  .mb-lg-1 {
    margin-bottom: 0.25rem !important;
  }

  .mb-lg-2 {
    margin-bottom: 0.5rem !important;
  }

  .mb-lg-3 {
    margin-bottom: 1rem !important;
  }

  .mb-lg-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-lg-5 {
    margin-bottom: 3rem !important;
  }

  .mb-lg-auto {
    margin-bottom: auto !important;
  }

  .ms-lg-0 {
    margin-left: 0 !important;
  }

  .ms-lg-1 {
    margin-left: 0.25rem !important;
  }

  .ms-lg-2 {
    margin-left: 0.5rem !important;
  }

  .ms-lg-3 {
    margin-left: 1rem !important;
  }

  .ms-lg-4 {
    margin-left: 1.5rem !important;
  }

  .ms-lg-5 {
    margin-left: 3rem !important;
  }

  .ms-lg-auto {
    margin-left: auto !important;
  }

  .p-lg-0 {
    padding: 0 !important;
  }

  .p-lg-1 {
    padding: 0.25rem !important;
  }

  .p-lg-2 {
    padding: 0.5rem !important;
  }

  .p-lg-3 {
    padding: 1rem !important;
  }

  .p-lg-4 {
    padding: 1.5rem !important;
  }

  .p-lg-5 {
    padding: 3rem !important;
  }

  .px-lg-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  .px-lg-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
  }

  .px-lg-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
  }

  .px-lg-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }

  .px-lg-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
  }

  .px-lg-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
  }

  .py-lg-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
  }

  .py-lg-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
  }

  .py-lg-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }

  .py-lg-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
  }

  .py-lg-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
  }

  .py-lg-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
  }

  .pt-lg-0 {
    padding-top: 0 !important;
  }

  .pt-lg-1 {
    padding-top: 0.25rem !important;
  }

  .pt-lg-2 {
    padding-top: 0.5rem !important;
  }

  .pt-lg-3 {
    padding-top: 1rem !important;
  }

  .pt-lg-4 {
    padding-top: 1.5rem !important;
  }

  .pt-lg-5 {
    padding-top: 3rem !important;
  }

  .pe-lg-0 {
    padding-right: 0 !important;
  }

  .pe-lg-1 {
    padding-right: 0.25rem !important;
  }

  .pe-lg-2 {
    padding-right: 0.5rem !important;
  }

  .pe-lg-3 {
    padding-right: 1rem !important;
  }

  .pe-lg-4 {
    padding-right: 1.5rem !important;
  }

  .pe-lg-5 {
    padding-right: 3rem !important;
  }

  .pb-lg-0 {
    padding-bottom: 0 !important;
  }

  .pb-lg-1 {
    padding-bottom: 0.25rem !important;
  }

  .pb-lg-2 {
    padding-bottom: 0.5rem !important;
  }

  .pb-lg-3 {
    padding-bottom: 1rem !important;
  }

  .pb-lg-4 {
    padding-bottom: 1.5rem !important;
  }

  .pb-lg-5 {
    padding-bottom: 3rem !important;
  }

  .ps-lg-0 {
    padding-left: 0 !important;
  }

  .ps-lg-1 {
    padding-left: 0.25rem !important;
  }

  .ps-lg-2 {
    padding-left: 0.5rem !important;
  }

  .ps-lg-3 {
    padding-left: 1rem !important;
  }

  .ps-lg-4 {
    padding-left: 1.5rem !important;
  }

  .ps-lg-5 {
    padding-left: 3rem !important;
  }
}
@media (min-width: 1200px) {
  .d-xl-inline {
    display: inline !important;
  }

  .d-xl-inline-block {
    display: inline-block !important;
  }

  .d-xl-block {
    display: block !important;
  }

  .d-xl-grid {
    display: grid !important;
  }

  .d-xl-table {
    display: table !important;
  }

  .d-xl-table-row {
    display: table-row !important;
  }

  .d-xl-table-cell {
    display: table-cell !important;
  }

  .d-xl-flex {
    display: flex !important;
  }

  .d-xl-inline-flex {
    display: inline-flex !important;
  }

  .d-xl-none {
    display: none !important;
  }

  .flex-xl-fill {
    flex: 1 1 auto !important;
  }

  .flex-xl-row {
    flex-direction: row !important;
  }

  .flex-xl-column {
    flex-direction: column !important;
  }

  .flex-xl-row-reverse {
    flex-direction: row-reverse !important;
  }

  .flex-xl-column-reverse {
    flex-direction: column-reverse !important;
  }

  .flex-xl-grow-0 {
    flex-grow: 0 !important;
  }

  .flex-xl-grow-1 {
    flex-grow: 1 !important;
  }

  .flex-xl-shrink-0 {
    flex-shrink: 0 !important;
  }

  .flex-xl-shrink-1 {
    flex-shrink: 1 !important;
  }

  .flex-xl-wrap {
    flex-wrap: wrap !important;
  }

  .flex-xl-nowrap {
    flex-wrap: nowrap !important;
  }

  .flex-xl-wrap-reverse {
    flex-wrap: wrap-reverse !important;
  }

  .justify-content-xl-start {
    justify-content: flex-start !important;
  }

  .justify-content-xl-end {
    justify-content: flex-end !important;
  }

  .justify-content-xl-center {
    justify-content: center !important;
  }

  .justify-content-xl-between {
    justify-content: space-between !important;
  }

  .justify-content-xl-around {
    justify-content: space-around !important;
  }

  .justify-content-xl-evenly {
    justify-content: space-evenly !important;
  }

  .align-items-xl-start {
    align-items: flex-start !important;
  }

  .align-items-xl-end {
    align-items: flex-end !important;
  }

  .align-items-xl-center {
    align-items: center !important;
  }

  .align-items-xl-baseline {
    align-items: baseline !important;
  }

  .align-items-xl-stretch {
    align-items: stretch !important;
  }

  .align-content-xl-start {
    align-content: flex-start !important;
  }

  .align-content-xl-end {
    align-content: flex-end !important;
  }

  .align-content-xl-center {
    align-content: center !important;
  }

  .align-content-xl-between {
    align-content: space-between !important;
  }

  .align-content-xl-around {
    align-content: space-around !important;
  }

  .align-content-xl-stretch {
    align-content: stretch !important;
  }

  .align-self-xl-auto {
    align-self: auto !important;
  }

  .align-self-xl-start {
    align-self: flex-start !important;
  }

  .align-self-xl-end {
    align-self: flex-end !important;
  }

  .align-self-xl-center {
    align-self: center !important;
  }

  .align-self-xl-baseline {
    align-self: baseline !important;
  }

  .align-self-xl-stretch {
    align-self: stretch !important;
  }

  .order-xl-first {
    order: -1 !important;
  }

  .order-xl-0 {
    order: 0 !important;
  }

  .order-xl-1 {
    order: 1 !important;
  }

  .order-xl-2 {
    order: 2 !important;
  }

  .order-xl-3 {
    order: 3 !important;
  }

  .order-xl-4 {
    order: 4 !important;
  }

  .order-xl-5 {
    order: 5 !important;
  }

  .order-xl-last {
    order: 6 !important;
  }

  .m-xl-0 {
    margin: 0 !important;
  }

  .m-xl-1 {
    margin: 0.25rem !important;
  }

  .m-xl-2 {
    margin: 0.5rem !important;
  }

  .m-xl-3 {
    margin: 1rem !important;
  }

  .m-xl-4 {
    margin: 1.5rem !important;
  }

  .m-xl-5 {
    margin: 3rem !important;
  }

  .m-xl-auto {
    margin: auto !important;
  }

  .mx-xl-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

  .mx-xl-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
  }

  .mx-xl-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
  }

  .mx-xl-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
  }

  .mx-xl-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
  }

  .mx-xl-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
  }

  .mx-xl-auto {
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .my-xl-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .my-xl-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
  }

  .my-xl-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }

  .my-xl-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
  }

  .my-xl-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
  }

  .my-xl-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }

  .my-xl-auto {
    margin-top: auto !important;
    margin-bottom: auto !important;
  }

  .mt-xl-0 {
    margin-top: 0 !important;
  }

  .mt-xl-1 {
    margin-top: 0.25rem !important;
  }

  .mt-xl-2 {
    margin-top: 0.5rem !important;
  }

  .mt-xl-3 {
    margin-top: 1rem !important;
  }

  .mt-xl-4 {
    margin-top: 1.5rem !important;
  }

  .mt-xl-5 {
    margin-top: 3rem !important;
  }

  .mt-xl-auto {
    margin-top: auto !important;
  }

  .me-xl-0 {
    margin-right: 0 !important;
  }

  .me-xl-1 {
    margin-right: 0.25rem !important;
  }

  .me-xl-2 {
    margin-right: 0.5rem !important;
  }

  .me-xl-3 {
    margin-right: 1rem !important;
  }

  .me-xl-4 {
    margin-right: 1.5rem !important;
  }

  .me-xl-5 {
    margin-right: 3rem !important;
  }

  .me-xl-auto {
    margin-right: auto !important;
  }

  .mb-xl-0 {
    margin-bottom: 0 !important;
  }

  .mb-xl-1 {
    margin-bottom: 0.25rem !important;
  }

  .mb-xl-2 {
    margin-bottom: 0.5rem !important;
  }

  .mb-xl-3 {
    margin-bottom: 1rem !important;
  }

  .mb-xl-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-xl-5 {
    margin-bottom: 3rem !important;
  }

  .mb-xl-auto {
    margin-bottom: auto !important;
  }

  .ms-xl-0 {
    margin-left: 0 !important;
  }

  .ms-xl-1 {
    margin-left: 0.25rem !important;
  }

  .ms-xl-2 {
    margin-left: 0.5rem !important;
  }

  .ms-xl-3 {
    margin-left: 1rem !important;
  }

  .ms-xl-4 {
    margin-left: 1.5rem !important;
  }

  .ms-xl-5 {
    margin-left: 3rem !important;
  }

  .ms-xl-auto {
    margin-left: auto !important;
  }

  .p-xl-0 {
    padding: 0 !important;
  }

  .p-xl-1 {
    padding: 0.25rem !important;
  }

  .p-xl-2 {
    padding: 0.5rem !important;
  }

  .p-xl-3 {
    padding: 1rem !important;
  }

  .p-xl-4 {
    padding: 1.5rem !important;
  }

  .p-xl-5 {
    padding: 3rem !important;
  }

  .px-xl-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  .px-xl-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
  }

  .px-xl-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
  }

  .px-xl-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }

  .px-xl-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
  }

  .px-xl-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
  }

  .py-xl-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
  }

  .py-xl-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
  }

  .py-xl-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }

  .py-xl-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
  }

  .py-xl-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
  }

  .py-xl-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
  }

  .pt-xl-0 {
    padding-top: 0 !important;
  }

  .pt-xl-1 {
    padding-top: 0.25rem !important;
  }

  .pt-xl-2 {
    padding-top: 0.5rem !important;
  }

  .pt-xl-3 {
    padding-top: 1rem !important;
  }

  .pt-xl-4 {
    padding-top: 1.5rem !important;
  }

  .pt-xl-5 {
    padding-top: 3rem !important;
  }

  .pe-xl-0 {
    padding-right: 0 !important;
  }

  .pe-xl-1 {
    padding-right: 0.25rem !important;
  }

  .pe-xl-2 {
    padding-right: 0.5rem !important;
  }

  .pe-xl-3 {
    padding-right: 1rem !important;
  }

  .pe-xl-4 {
    padding-right: 1.5rem !important;
  }

  .pe-xl-5 {
    padding-right: 3rem !important;
  }

  .pb-xl-0 {
    padding-bottom: 0 !important;
  }

  .pb-xl-1 {
    padding-bottom: 0.25rem !important;
  }

  .pb-xl-2 {
    padding-bottom: 0.5rem !important;
  }

  .pb-xl-3 {
    padding-bottom: 1rem !important;
  }

  .pb-xl-4 {
    padding-bottom: 1.5rem !important;
  }

  .pb-xl-5 {
    padding-bottom: 3rem !important;
  }

  .ps-xl-0 {
    padding-left: 0 !important;
  }

  .ps-xl-1 {
    padding-left: 0.25rem !important;
  }

  .ps-xl-2 {
    padding-left: 0.5rem !important;
  }

  .ps-xl-3 {
    padding-left: 1rem !important;
  }

  .ps-xl-4 {
    padding-left: 1.5rem !important;
  }

  .ps-xl-5 {
    padding-left: 3rem !important;
  }
}
@media (min-width: 1400px) {
  .d-xxl-inline {
    display: inline !important;
  }

  .d-xxl-inline-block {
    display: inline-block !important;
  }

  .d-xxl-block {
    display: block !important;
  }

  .d-xxl-grid {
    display: grid !important;
  }

  .d-xxl-table {
    display: table !important;
  }

  .d-xxl-table-row {
    display: table-row !important;
  }

  .d-xxl-table-cell {
    display: table-cell !important;
  }

  .d-xxl-flex {
    display: flex !important;
  }

  .d-xxl-inline-flex {
    display: inline-flex !important;
  }

  .d-xxl-none {
    display: none !important;
  }

  .flex-xxl-fill {
    flex: 1 1 auto !important;
  }

  .flex-xxl-row {
    flex-direction: row !important;
  }

  .flex-xxl-column {
    flex-direction: column !important;
  }

  .flex-xxl-row-reverse {
    flex-direction: row-reverse !important;
  }

  .flex-xxl-column-reverse {
    flex-direction: column-reverse !important;
  }

  .flex-xxl-grow-0 {
    flex-grow: 0 !important;
  }

  .flex-xxl-grow-1 {
    flex-grow: 1 !important;
  }

  .flex-xxl-shrink-0 {
    flex-shrink: 0 !important;
  }

  .flex-xxl-shrink-1 {
    flex-shrink: 1 !important;
  }

  .flex-xxl-wrap {
    flex-wrap: wrap !important;
  }

  .flex-xxl-nowrap {
    flex-wrap: nowrap !important;
  }

  .flex-xxl-wrap-reverse {
    flex-wrap: wrap-reverse !important;
  }

  .justify-content-xxl-start {
    justify-content: flex-start !important;
  }

  .justify-content-xxl-end {
    justify-content: flex-end !important;
  }

  .justify-content-xxl-center {
    justify-content: center !important;
  }

  .justify-content-xxl-between {
    justify-content: space-between !important;
  }

  .justify-content-xxl-around {
    justify-content: space-around !important;
  }

  .justify-content-xxl-evenly {
    justify-content: space-evenly !important;
  }

  .align-items-xxl-start {
    align-items: flex-start !important;
  }

  .align-items-xxl-end {
    align-items: flex-end !important;
  }

  .align-items-xxl-center {
    align-items: center !important;
  }

  .align-items-xxl-baseline {
    align-items: baseline !important;
  }

  .align-items-xxl-stretch {
    align-items: stretch !important;
  }

  .align-content-xxl-start {
    align-content: flex-start !important;
  }

  .align-content-xxl-end {
    align-content: flex-end !important;
  }

  .align-content-xxl-center {
    align-content: center !important;
  }

  .align-content-xxl-between {
    align-content: space-between !important;
  }

  .align-content-xxl-around {
    align-content: space-around !important;
  }

  .align-content-xxl-stretch {
    align-content: stretch !important;
  }

  .align-self-xxl-auto {
    align-self: auto !important;
  }

  .align-self-xxl-start {
    align-self: flex-start !important;
  }

  .align-self-xxl-end {
    align-self: flex-end !important;
  }

  .align-self-xxl-center {
    align-self: center !important;
  }

  .align-self-xxl-baseline {
    align-self: baseline !important;
  }

  .align-self-xxl-stretch {
    align-self: stretch !important;
  }

  .order-xxl-first {
    order: -1 !important;
  }

  .order-xxl-0 {
    order: 0 !important;
  }

  .order-xxl-1 {
    order: 1 !important;
  }

  .order-xxl-2 {
    order: 2 !important;
  }

  .order-xxl-3 {
    order: 3 !important;
  }

  .order-xxl-4 {
    order: 4 !important;
  }

  .order-xxl-5 {
    order: 5 !important;
  }

  .order-xxl-last {
    order: 6 !important;
  }

  .m-xxl-0 {
    margin: 0 !important;
  }

  .m-xxl-1 {
    margin: 0.25rem !important;
  }

  .m-xxl-2 {
    margin: 0.5rem !important;
  }

  .m-xxl-3 {
    margin: 1rem !important;
  }

  .m-xxl-4 {
    margin: 1.5rem !important;
  }

  .m-xxl-5 {
    margin: 3rem !important;
  }

  .m-xxl-auto {
    margin: auto !important;
  }

  .mx-xxl-0 {
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

  .mx-xxl-1 {
    margin-right: 0.25rem !important;
    margin-left: 0.25rem !important;
  }

  .mx-xxl-2 {
    margin-right: 0.5rem !important;
    margin-left: 0.5rem !important;
  }

  .mx-xxl-3 {
    margin-right: 1rem !important;
    margin-left: 1rem !important;
  }

  .mx-xxl-4 {
    margin-right: 1.5rem !important;
    margin-left: 1.5rem !important;
  }

  .mx-xxl-5 {
    margin-right: 3rem !important;
    margin-left: 3rem !important;
  }

  .mx-xxl-auto {
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .my-xxl-0 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
  }

  .my-xxl-1 {
    margin-top: 0.25rem !important;
    margin-bottom: 0.25rem !important;
  }

  .my-xxl-2 {
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }

  .my-xxl-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
  }

  .my-xxl-4 {
    margin-top: 1.5rem !important;
    margin-bottom: 1.5rem !important;
  }

  .my-xxl-5 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
  }

  .my-xxl-auto {
    margin-top: auto !important;
    margin-bottom: auto !important;
  }

  .mt-xxl-0 {
    margin-top: 0 !important;
  }

  .mt-xxl-1 {
    margin-top: 0.25rem !important;
  }

  .mt-xxl-2 {
    margin-top: 0.5rem !important;
  }

  .mt-xxl-3 {
    margin-top: 1rem !important;
  }

  .mt-xxl-4 {
    margin-top: 1.5rem !important;
  }

  .mt-xxl-5 {
    margin-top: 3rem !important;
  }

  .mt-xxl-auto {
    margin-top: auto !important;
  }

  .me-xxl-0 {
    margin-right: 0 !important;
  }

  .me-xxl-1 {
    margin-right: 0.25rem !important;
  }

  .me-xxl-2 {
    margin-right: 0.5rem !important;
  }

  .me-xxl-3 {
    margin-right: 1rem !important;
  }

  .me-xxl-4 {
    margin-right: 1.5rem !important;
  }

  .me-xxl-5 {
    margin-right: 3rem !important;
  }

  .me-xxl-auto {
    margin-right: auto !important;
  }

  .mb-xxl-0 {
    margin-bottom: 0 !important;
  }

  .mb-xxl-1 {
    margin-bottom: 0.25rem !important;
  }

  .mb-xxl-2 {
    margin-bottom: 0.5rem !important;
  }

  .mb-xxl-3 {
    margin-bottom: 1rem !important;
  }

  .mb-xxl-4 {
    margin-bottom: 1.5rem !important;
  }

  .mb-xxl-5 {
    margin-bottom: 3rem !important;
  }

  .mb-xxl-auto {
    margin-bottom: auto !important;
  }

  .ms-xxl-0 {
    margin-left: 0 !important;
  }

  .ms-xxl-1 {
    margin-left: 0.25rem !important;
  }

  .ms-xxl-2 {
    margin-left: 0.5rem !important;
  }

  .ms-xxl-3 {
    margin-left: 1rem !important;
  }

  .ms-xxl-4 {
    margin-left: 1.5rem !important;
  }

  .ms-xxl-5 {
    margin-left: 3rem !important;
  }

  .ms-xxl-auto {
    margin-left: auto !important;
  }

  .p-xxl-0 {
    padding: 0 !important;
  }

  .p-xxl-1 {
    padding: 0.25rem !important;
  }

  .p-xxl-2 {
    padding: 0.5rem !important;
  }

  .p-xxl-3 {
    padding: 1rem !important;
  }

  .p-xxl-4 {
    padding: 1.5rem !important;
  }

  .p-xxl-5 {
    padding: 3rem !important;
  }

  .px-xxl-0 {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }

  .px-xxl-1 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important;
  }

  .px-xxl-2 {
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
  }

  .px-xxl-3 {
    padding-right: 1rem !important;
    padding-left: 1rem !important;
  }

  .px-xxl-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
  }

  .px-xxl-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
  }

  .py-xxl-0 {
    padding-top: 0 !important;
    padding-bottom: 0 !important;
  }

  .py-xxl-1 {
    padding-top: 0.25rem !important;
    padding-bottom: 0.25rem !important;
  }

  .py-xxl-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }

  .py-xxl-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
  }

  .py-xxl-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
  }

  .py-xxl-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
  }

  .pt-xxl-0 {
    padding-top: 0 !important;
  }

  .pt-xxl-1 {
    padding-top: 0.25rem !important;
  }

  .pt-xxl-2 {
    padding-top: 0.5rem !important;
  }

  .pt-xxl-3 {
    padding-top: 1rem !important;
  }

  .pt-xxl-4 {
    padding-top: 1.5rem !important;
  }

  .pt-xxl-5 {
    padding-top: 3rem !important;
  }

  .pe-xxl-0 {
    padding-right: 0 !important;
  }

  .pe-xxl-1 {
    padding-right: 0.25rem !important;
  }

  .pe-xxl-2 {
    padding-right: 0.5rem !important;
  }

  .pe-xxl-3 {
    padding-right: 1rem !important;
  }

  .pe-xxl-4 {
    padding-right: 1.5rem !important;
  }

  .pe-xxl-5 {
    padding-right: 3rem !important;
  }

  .pb-xxl-0 {
    padding-bottom: 0 !important;
  }

  .pb-xxl-1 {
    padding-bottom: 0.25rem !important;
  }

  .pb-xxl-2 {
    padding-bottom: 0.5rem !important;
  }

  .pb-xxl-3 {
    padding-bottom: 1rem !important;
  }

  .pb-xxl-4 {
    padding-bottom: 1.5rem !important;
  }

  .pb-xxl-5 {
    padding-bottom: 3rem !important;
  }

  .ps-xxl-0 {
    padding-left: 0 !important;
  }

  .ps-xxl-1 {
    padding-left: 0.25rem !important;
  }

  .ps-xxl-2 {
    padding-left: 0.5rem !important;
  }

  .ps-xxl-3 {
    padding-left: 1rem !important;
  }

  .ps-xxl-4 {
    padding-left: 1.5rem !important;
  }

  .ps-xxl-5 {
    padding-left: 3rem !important;
  }
}
@media print {
  .d-print-inline {
    display: inline !important;
  }

  .d-print-inline-block {
    display: inline-block !important;
  }

  .d-print-block {
    display: block !important;
  }

  .d-print-grid {
    display: grid !important;
  }

  .d-print-table {
    display: table !important;
  }

  .d-print-table-row {
    display: table-row !important;
  }

  .d-print-table-cell {
    display: table-cell !important;
  }

  .d-print-flex {
    display: flex !important;
  }

  .d-print-inline-flex {
    display: inline-flex !important;
  }

  .d-print-none {
    display: none !important;
  }
}

/*# sourceMappingURL=bootstrap-grid.css.map */
.container,
.container-fluid,
.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm {
  padding-top:0px; 
  padding-bottom:0px; 
}

.row {
  padding-top:0px; 
  padding-bottom:0px;
}


[tabindex="-1"]:focus:not(:focus-visible) {
outline: 0 !important;
}

hr {
margin: 1rem 0;
color: inherit;
background-color: currentColor;
border: 0;
opacity: 0.25;
}

hr:not([size]) {
height: 1px;
}

h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
margin-top: 0;
margin-bottom: 0;
font-weight: 500;
line-height: 1.2;
}

h1, .h1 {
font-size: calc(1.375rem + 1.5vw);
}
@media (min-width: 1200px) {
h1, .h1 {
font-size: 2.5rem;
}
}

h2, .h2 {
font-size: calc(1.325rem + 0.9vw);
}
@media (min-width: 1200px) {
h2, .h2 {
font-size: 2rem;
}
}

h3, .h3 {
font-size: calc(1.3rem + 0.6vw);
}
@media (min-width: 1200px) {
h3, .h3 {
font-size: 1.75rem;
}
}

h4, .h4 {
font-size: calc(1.275rem + 0.3vw);
}
@media (min-width: 1200px) {
h4, .h4 {
font-size: 1.5rem;
}
}

h5, .h5 {
font-size: 1.25rem;
}

h6, .h6 {
font-size: 1rem;
}

p {
margin-top: 0;
margin-bottom: 1rem;
}

abbr[title],
abbr[data-bs-original-title] {
text-decoration: underline;
-webkit-text-decoration: underline dotted;
text-decoration: underline dotted;
cursor: help;
-webkit-text-decoration-skip-ink: none;
text-decoration-skip-ink: none;
}

address {
margin-bottom: 1rem;
font-style: normal;
line-height: inherit;
}

ol,
ul {
padding-left: 2rem;
}

ol,
ul,
dl {
margin-top: 0;
margin-bottom: 0;
}

ol ol,
ul ul,
ol ul,
ul ol {
margin-bottom: 0;
}

dt {
font-weight: 700;
}

dd {
margin-bottom: 0.5rem;
margin-left: 0;
}

blockquote {
margin: 0 0 1rem;
}

b,
strong {
font-weight: bolder;
}

small, .small {
font-size: 0.875em;
}

mark, .mark {
padding: 0.2em;
background-color: #fcf8e3;
}

sub,
sup {
position: relative;
font-size: 0.75em;
line-height: 0;
vertical-align: baseline;
}

sub {
bottom: -0.25em;
}

sup {
top: -0.5em;
}

a {
color: #0d6efd;
text-decoration: underline;
}
a:hover {
color: #0a58ca;
}

a:not([href]):not([class]), a:not([href]):not([class]):hover {
color: inherit;
text-decoration: none;
}

pre,
code,
kbd,
samp {
font-family: var(--bs-font-monospace);
font-size: 1em;
direction: ltr / rtl:ignore /;
unicode-bidi: bidi-override;
}

pre {
display: block;
margin-top: 0;
margin-bottom: 1rem;
overflow: auto;
font-size: 0.875em;
}
pre code {
font-size: inherit;
color: inherit;
word-break: normal;
}

code {
font-size: 0.875em;
color: #d63384;
word-wrap: break-word;
}
a > code {
color: inherit;
}

kbd {
padding: 0.2rem 0.4rem;
font-size: 0.875em;
color: #fff;
background-color: #212529;
border-radius: 0.2rem;
}
kbd kbd {
padding: 0;
font-size: 1em;
font-weight: 700;
}

figure {
margin: 0 0 1rem;
}

img,
svg {
vertical-align: middle;
}

table {
caption-side: bottom;
border-collapse: collapse;
}

caption {
padding-top: 0.5rem;
padding-bottom: 0.5rem;
color: #6c757d;
text-align: left;
}

th {
text-align: inherit;
text-align: -webkit-match-parent;
}

thead,
tbody,
tfoot,
tr,
td,
th {
border-color: inherit;
border-style: solid;
border-width: 0;
}

label {
display: inline-block;
}

button {
border-radius: 0;
}

button:focus:not(:focus-visible) {
outline: 0;
}

input,
button,
select,
optgroup,
textarea {
margin: 0;
font-family: inherit;
font-size: inherit;
line-height: inherit;
}

button,
select {
text-transform: none;
}

[role=button] {
cursor: pointer;
}

select {
word-wrap: normal;
}

[list]::-webkit-calendar-picker-indicator {
display: none;
}

button,
[type=button],
[type=reset],
[type=submit] {
-webkit-appearance: button;
}
button:not(:disabled),
[type=button]:not(:disabled),
[type=reset]:not(:disabled),
[type=submit]:not(:disabled) {
cursor: pointer;
}

::-moz-focus-inner {
padding: 0;
border-style: none;
}

textarea {
resize: vertical;
}

fieldset {
min-width: 0;
padding: 0;
margin: 0;
border: 0;
}

legend {
float: left;
width: 100%;
padding: 0;
margin-bottom: 0.5rem;
font-size: calc(1.275rem + 0.3vw);
line-height: inherit;
}
@media (min-width: 1200px) {
legend {
font-size: 1.5rem;
}
}
legend + * {
clear: left;
}

::-webkit-datetime-edit-fields-wrapper,
::-webkit-datetime-edit-text,
::-webkit-datetime-edit-minute,
::-webkit-datetime-edit-hour-field,
::-webkit-datetime-edit-day-field,
::-webkit-datetime-edit-month-field,
::-webkit-datetime-edit-year-field {
padding: 0;
}

::-webkit-inner-spin-button {
height: auto;
}

[type=search] {
outline-offset: -2px;
-webkit-appearance: textfield;
}

/* rtl:raw:
[type="tel"],
[type="url"],
[type="email"],
[type="number"] {
direction: ltr;
}
*/
::-webkit-search-decoration {
-webkit-appearance: none;
}

::-webkit-color-swatch-wrapper {
padding: 0;
}

::file-selector-button {
font: inherit;
}

::-webkit-file-upload-button {
font: inherit;
-webkit-appearance: button;
}

output {
display: inline-block;
}

iframe {
border: 0;
}

summary {
display: list-item;
cursor: pointer;
}

progress {
vertical-align: baseline;
}

[hidden] {
display: none !important;
}

</style>

<style type="text/css">

section:hover, header:hover, footer:hover {
   /* border: 1px solid #fb8f8f!important;*/
}


/*
   Edit box
*/

*{
   margin:0;
   padding:0;
   margin-top:0;
   margin-bottom:0;
   /*border:1px dashed transparent!important;*/
}

.edit-text {
    -webkit-box-shadow: 0 0 0 1px #4285f4!important;
    box-shadow: 0 0 0 1px #4285f4!important;
    /*border:1px solid #4285f4!important;*/
}

</style>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<style type="text/css">

body {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: #2F3A5F;
    background: #fff;
    margin: 0;
    overflow-x: hidden;
}
a {
    text-decoration: none;
    color: #2F3A5F;
    transition: all .3s;
}
a:hover {
    text-decoration: none;
    color: #2F3A5F;
}

/*div { */
/* min-height:50px;   */
/*}*/

.boder {
    -webkit-box-shadow: 0 0 0 1px #71d7f7;
    box-shadow: 0 0 0 1px #71d7f7;
    /*border:1px dashed #4285f4!important;*/
}


/* Top Header  */
.header-top-area {
    padding: 20px 0;
    background: <?php echo $color_bg; ?>;
    color: #fff;
    font-weight: 500;
}
.header-top-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.header-top-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}
.header-top-right-single {
    padding: 0 25px;
    color: #fff;
    border-right: 1px solid #B8ECFF;
    display: flex;
    align-items: center;
    font-size: 14px;
}
.header-top-right-single img {
    margin-right: 6px;
}
.header-top-right-single:last-child {
    border-right: none;
    padding-right: 0;
}

/* Navigation */

.header-area {
    background: #fff;
    padding: 17px 0;
}
.header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header-logo img {
    max-height: 56px;
}
.header-menu {
	display: flex;
	justify-content: flex-end;
	align-items: center;
}
.side-menu-close {
    background: transparent;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    display: none;

}
.side-menu-close span {
    height: 2px;
    width: 20px;
    background: #fff;
    position: relative;
    opacity: 1;
    transition: .4s;
    -webkit-transition: .4s;
    -moz-transition: .4s;
    -ms-transition: .4s;
    -o-transition: .4s;
    display: block;
}
header .side-menu-close span {
    background: #21395F;
    width: 28px;
}
.side-menu-close span:nth-child(1) {
    top: -5px;
}
.side-menu-close span:nth-child(3) {
    bottom: -5px;
}
.side-menu-close.closed span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
    -webkit-transform: translateY(7px) rotate(45deg);
    -moz-transform: translateY(7px) rotate(45deg);
    -ms-transform: translateY(7px) rotate(45deg);
    -o-transform: translateY(7px) rotate(45deg);
}
.side-menu-close.closed span:nth-child(2) {
    opacity: 0;
}
.side-menu-close.closed span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
    -webkit-transform: translateY(-7px) rotate(-45deg);
    -moz-transform: translateY(-7px) rotate(-45deg);
    -ms-transform: translateY(-7px) rotate(-45deg);
    -o-transform: translateY(-7px) rotate(-45deg);
}
.side-menu-wrap {
    width: 240px;
    position: fixed;
    left: -100%;
    top: 0;
    background: #fff;
    height: 100%;
    box-shadow: 0 1px 5px 0 rgba(83, 83, 83, 0.2);
    overflow-y: auto;
    z-index: 15000;
    transition: .4s;
    -webkit-transition: .4s;
    -moz-transition: .4s;
    -ms-transition: .4s;
    -o-transition: .4s;
}
.side-menu-nav .main-menu {
    padding: 0;
}
.side-menu-wrap.opened {
    left: 0;
    transition: .8s;
    -webkit-transition: .8s;
    -moz-transition: .8s;
    -ms-transition: .8s;
    -o-transition: .8s;
}
.side-menu-nav ul {
    display: flex;
    flex-direction: column;
}
.side-menu-nav ul li {
list-style: none;
}
.side-menu-nav ul li a {
    font-size: 18px;
    margin: ;
    padding: 4px 0;
    display: block;
}
@media only screen and (max-width: 991px) {
.side-menu-close {
    display: flex;
}
.nav-menu-area {
    display: none;
}
}

.main-menu {
    display: flex;
    align-items: center;
}
.main-menu li a {
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    padding: 0 18px;
    line-height: 49px;
}
.main-menu li {
    list-style: none;
}
.main-menu li a:hover {
    color: <?php echo $color_bg; ?>;
}
.main-menu .login {
    width: 145px;
    background: <?php echo $color_bg; ?>;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
    line-height: 49px;
    cursor: pointer;
    transition: all .3s;
    border: none;
    margin-left: 20px;
    text-transform: uppercase;
}
.main-menu .login:hover {
    background: #061829;
}

.single-fine-us-block-left-upper .icon img {
    max-height: 22px;
}

</style>

<style type="text/css">
.banner-left {
	width: 665px;
}
.banner-right {
    width: calc(100% - 665px);
    height: 100%;
}
.banner-buttons a {
	width: 203px;
	border: 1px solid <?php echo $color_bg; ?>;
	height: 53px;
	text-align: center;
	line-height: 53px;
	font-size: 16px;
	font-weight: 600;
	text-transform: uppercase;
	color: <?php echo $color_bg; ?>;
	border-radius: 26px;
}
.banner-buttons a:hover {
    background-color: <?php echo $color_bg; ?>;
    color: #fff;
}
.banner-buttons .blue {
	background-color: <?php echo $color_bg; ?>;
	color: #fff;
	margin-right: 25px;
}
.banner-buttons .blue:hover {
	color: <?php echo $color_bg; ?>;
	background-color: transparent;
}
.banner-socials-inner {
	max-width: 347px;
	background: #fff;
	padding: 20px 47px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
}
/*.banner-area::before {*/
/*	content: '';*/
/*	width: 100%;*/
/*	height: 100%;*/
/*	background: rgba(0, 147, 200, .6);*/
/*	position: absolute;*/
/*	top: 0;*/
/*	left: 0;*/
/*}*/
.banner-socials-inner a {
    font-size: 20px;
    color: #2DB9EB;
    margin: 0 26px;
}
.banner-buttons .btn-border {
	background: transparent;
	color: #fff;
	margin-left: 10px;
}
.banner-buttons a:hover {
    background: <?php echo $color_bg; ?>;
    border-color: <?php echo $color_bg; ?>;
    color: #fff;
}
.skills-boxs-left {
  width: calc(50% - 30px);
  margin-right: 60px;
}
.skills-boxs-right {
  width: calc(50% - 30px);
}
.skills-box-single {
	display: flex;
	margin-bottom: 68px;
}
.skills-box-single .left {
	width: 75px;
	display: flex;
}
.skills-box-single .right h3 {
	margin: 0;
	font-size: 27px;
	line-height: 27px;
	font-weight: 700;
	margin-bottom: 18px;
    text-transform: uppercase;
}
.skills-box-single .right p {
	margin: 0;
	font-size: 20px;
	line-height: 31px;
}
.skills-box-single .left .icon i {
    font-size: 25px;
    color: <?php echo $color_bg; ?>;
}
.banner-right {
    position: relative;
}
.banner-right-shape-inner {
    width: 670px;
    height: 675px;
    position: absolute;
    background-color: <?php echo $color_bg; ?>;
    bottom: -50%;
    left: 0;
    border-radius: 50%;
}
.banner-area {
    overflow: hidden;
}
.appointment-area {
    display: none;
}

.about-right-text::before {
	content: '';
	position: absolute;
	top: 0;
	right: 100%;
	height: 100%;
	width: 220px;
	background-color: #ffffff;
}
.about-right-text::after {
	content: '';
	position: absolute;
	top: 0;
	left: 100%;
	height: 100%;
	width: 99999999px;
	background-color: #ffffff;
}
.home-gallery-single::after {
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	opacity: 0.5;
	z-index: -1;
	transition: all 0.3s ease 0s;
}
.home-gallery-single:hover::after {
	left: 100%;
	transition: all 0.3s ease 0s;
}

.law-find-us {
	border-bottom: 1px solid #E5E5E5;
}
.law-find-us-upper {
	padding: 31px 15px;
	background: #fff;
	border-top: 2px solid <?php echo $color_bg; ?>;
}
.law-find-us-upper h4 {
	font-size: 24px;
	font-weight: 700;
	text-transform: uppercase;
	margin: 0;
	line-height: 20px;
	color: <?php echo $color_bg; ?>;
	text-align: center;
}
.law-find-us-bottom {
	display: flex;
	background: #fff;
	/*border-top: 1px solid #E5E5E5;*/
	/*padding-bottom: 60px;*/
	flex-wrap: wrap;
	justify-content: space-between;
}
.law-find-us-bottom .left, .law-find-us-bottom .right {
	width: calc(50% - 40px);
}
.single-fine-us-block {
	min-height: 100px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0px;
	border-bottom: 1px solid #E5E5E5;
	transition: all .3s;
	width: calc(50% - 20px);
}
.single-fine-us-block:hover {
	color: #2F3A5F;
	background: #DFF7FF;
}
.single-fine-us-block-left {
	width: calc(100% - 85px);
}
.single-fine-us-block-left-upper {
	display: flex;
	align-items: center;
	margin-bottom: 12px;
}
.single-fine-us-block-left-upper .icon {
	width: 32px;
	background: <?php echo $color_bg; ?>;
	height: 32px;
	display: flex;
	align-items: center;
	justify-content: center;
	background-repeat: no-repeat;
	background-size: auto;
	background-position: center;
}
.single-fine-us-block-left-bottom {
	font-size: 14px;
	line-height: 20px;
}
.single-fine-us-block-right {
	width: 45px;
}
.single-fine-us-block-left-upper h4 {
	margin: 0;
	width: calc(100% - 32px);
	padding-left: 10px;
	font-weight: 600;
	text-transform: uppercase;
	font-size: 14px;
}
.single-fine-us-block-right {
	width: 45px;
	height: 45px;
	border: 1px solid #E2E2E2;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 50%;
    transition: all .3s;
}
.find-us-head {
	padding: 30px 40px;
	background: #fff;
	font-size: 27px;
	font-weight: 600;
	text-transform: uppercase;
	line-height: 1;
}
.single-fine-us-block:hover .single-fine-us-block-right {
    border-color: <?php echo $color_bg; ?>;
    background: <?php echo $color_bg; ?>;
}
.single-fine-us-block:hover .single-fine-us-block-right img {
    filter: grayscale(0) brightness(100);
}
.law-find-us .section-container {
	position: relative;
	z-index: 9;
}
.single-fine-us-block-inner {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0 40px;
	width: 100%;
}
.testimonial-single-inner {
	border: 1px solid <?php echo $color_bg; ?>;
	padding: 70px 35px 45px 35px;
    position: relative;
    margin-top: 74px;
}
.testimonial-single-inner .avatar {
	width: 148px;
	height: 148px;
	position: absolute;
	top: -74px;
	left: 0;
}
.testimonial-single-inner h3 {
	font-size: 14px;
	font-weight: 600;
	margin-top: 0;
	margin-bottom: 35px;
}
.testimonial-single-inner p {
	font-size: 15px;
	color: <?php echo $color_bg; ?>;
	line-height: 26px;
	margin-bottom: 40px;
}
.testimonial-single-inner .locationn {
	display: flex;
	align-items: center;
}
.testimonial-single-inner .locationn i {
    font-size: 16px;
    margin-right: 6px;
    color: <?php echo $color_bg; ?>;
}
.testimonial-single-inner .locationn span {
	font-size: 12px;
	font-weight: 600;
}
.testimonial-area {
	padding: 80px 0;
}
.testimonial-area .section-title {
	margin-bottom: 20px;
}
.testimonial-wrapper .owl-nav {
	margin-top: 30px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.cta-left a i {
	margin-left: 5px;
    transition: all .3s;
}
.cta-left a:hover i {
	margin-left: 10px;
}
.cta-socials-inner a {
    font-size: 20px;
    color: #2DB9EB;
}
.cta-socials-inner a:hover {
    color: #061829;
}
.testmonial-items button {
    outline: none;
    border: none;
    background: no-repeat;
}


.team-area {
	padding: 90px 0;
	background: #ffff;
}
.team-title h2 {
	text-align: center;
	text-transform: uppercase;
	margin: 0;
	font-size: 31px;
	line-height: 1;
	margin-bottom: 40px;
}
.team-row {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
}
.law-team-single {
	width: calc(25% - 72px);
	background: #F9F9F9;
	border-radius: 5px;
	box-shadow: 0 4px 3px #DFDFDF;
	padding: 24px 25px 35px;
	display: flex;
	flex-direction: column;
	align-items: center;
	margin-right: 20px;
	margin-bottom: 20px;
}
.team-img {
	width: 111px;
	height: 111px;
	border-radius: 50%;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}
.team-content h2 {
	font-size: 20px;
	font-weight: 700;
	margin-top: 10px;
	margin-bottom: 0;
	text-align: center;
}
.team-buttons {
    display: none;
}
.team-content p {
	font-size: 12px;
	font-weight: 600;
	line-height: 1;
	text-align: center;
	margin: 0;
}

.portfolio-items-wrapper {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
}
.portfolio-items-wrapper .portfolio-single {
	width: calc(50% - 15px);
	margin-bottom: 60px;
}
.portfolio-single .image {
	border: 10px solid #fff;
}
.portfolio-single .image-inner {
	width: 100%;
	height: 400px;
	background-repeat: no-repeat;
	background-size: auto;
	background-position: center;
}
.portfolio-single h2 {
	font-size: 27px;
	font-weight: 700;
	text-transform: uppercase;
	color: <?php echo $color_bg; ?>;
	margin-top: 25px;
	margin-bottom: 5px;
}
.portfolio-single p {
	font-size: 18px;
	line-height: 30px;
	margin: 0;
}
.skills-button {
	display: flex;
	align-items: center;
	justify-content: center;
}




/*.team-single p {*/
/*	font-size: 12px;*/
/*	text-align: center;*/
/*	font-weight: 500;*/
/*	margin-top: 15px;*/
/*	margin-bottom: 0;*/
/*}*/
.footer-menu {
	display: flex;
	align-items: center;
	justify-content: center;
}
.footer-menu a {
	color: #fff;
	padding: 0 19px;
	position: relative;
    transition: all .3s;
}
.footer-menu a:hover, .footer-bottom-area a:hover {
    color: <?php echo $color_bg; ?>;
}
.footer-menu a::after {
	content: '';
	width: 1px;
	height: 14px;
	background: #FFF;
	display: inline-block;
	position: absolute;
	right: 0;
	top: 5px;
}
.footer-menu a:last-child::after {
	display: none;
}

.footer-logo-area img {
    max-height: 58px;
}
.skills-box-single .right {
	width: calc(100% - 90px);
}


.law-contact {
    padding: 70px 0;
}
.law-contact .law-row {
    background: #fff;
}
.law-contact-con-us {
    width: 560px;
    border-left: 1px solid #EBEBEB;
}
.law-contact-title {
    border-bottom: 1px solid #E5E5E5;
    height: 90px;
    padding-left: 80px;
    display: flex;
    align-items: center;
}
.law-contact-title .icon .img {
    width: 32px;
    height: 32px;
    background: #C29C6A;
    display: flex;
    align-items: center;
    justify-content: center;
}
.law-contact-title .icon {
    display: flex;
    align-items: center;
}
.law-contact-title .icon h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    padding-left: 14px;
    text-transform: uppercase;
}
.law-contact-hour-list {
    margin: 40px 0;
    padding: 0 80px;
    border-right: 1px solid #E5E5E5;
}
.law-contact-hour-list-single {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #F3F3F3;
}
.law-contact-hour-list-single:last-child {
    border-bottom: none;
}
.law-contact-list, .law-contact-social {
    padding: 0 65px;
}
.law-contact-hour {
    width: calc(100% - 560px);
}
.law-contact-list-single {
    display: flex;
    align-items: center;
    padding: 10px 0;
}
.law-contact-list-single .icon {
    margin-right: 10px;
    width: 18px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.law-contact-list-single a {
    line-height: 24px;
}
.law-contact-social h5 {
    font-size: 14px;
    font-weight: 400;
    margin: 13px 0;
}
.law-contact-social-button {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}
.law-contact-social-button a {
    width: 35px;
    height: 35px;
    border: 1px solid #E8E8E8;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 0 3px 6px rgba(226, 226, 226, .5);
    transform: all .3s;
}
.law-contact-social-button a:hover {
    background: #2F3A5F;
    box-shadow: none;
    border-color: #2F3A5F;
}
.contact-wrapper {
    background: #fff;
    padding-bottom: 35px;
}
.contact-title {
    padding: 25px 15px 25px 80px;
    font-size: 22px;
    font-weight: 700;
    text-transform: uppercase;
    color: <?php echo $color_bg; ?>;
    line-height: 1;
    border-bottom: 1px solid #E5E5E5;
    margin-bottom: 30px;
}
.law-contact .section-row {
    display: flex;
}
.form-wrapper {
	max-width: 940px;
	margin: 0 auto;
	padding: 0 15px;
}
.form-wrapper input {
	height: 57px;
	border: 1px solid #AEBCD1;
	padding: 0 15px;
	font-size: 14px;
	width: 100%;
	font-weight: 500;
  outline: none;
}
.form-wrapper input::placeholder {
  color: #A0A3A8;
  opacity: 1;
}

.form-wrapper input:-ms-input-placeholder {
  color: #A0A3A8;
}

.form-wrapper input::-ms-input-placeholder {
  color: #A0A3A8;
}
.form-row-two {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 25px;
}
.form-row {
	display: flex;
}
.form-row-two, .form-row  {
    margin-bottom: 25px;
}
.form-wrapper select {
    -moz-appearance:none; /* Firefox */
    -webkit-appearance:none; /* Safari and Chrome */
    appearance:none;
}
.form-wrapper select {
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	height: 57px;
	border: 1px solid #AEBCD1;
	padding: 0 15px;
	font-size: 14px;
	width: 100%;
	font-weight: 500;
	color: #A0A3A8;
  outline: none;
}
.form-wrapper textarea {
  border: 1px solid #AEBCD1;
  padding: 0 15px;
  font-size: 14px;
  width: 100%;
  font-weight: 500;
  resize: none;
  padding-top: 20px;
  height: 185px;
  font-family: 'Poppins', sans-serif;
  color: #2F3A5F;
  outline: none;
}
.form-wrapper input[type="submit"] {
	width: 225px;
	height: 63px;
	border: none;
	background: <?php echo $color_bg; ?>;
	font-size: 18px;
	font-weight: 500;
	text-transform: uppercase;
	color: #fff;
	cursor: pointer;
	transition: all .3s;
	border-radius: 32px;
}
.form-contact-row {
	display: flex;
	align-items: flex-end;
}
.form-wrapper input:focus, .form-wrapper textarea:focus {
    border-color: rgba(36, 124, 255, .5);
}

.footer-area {
	background: #fff;
	padding-top: 80px;
	padding-bottom: 65px;
	color: #061829;
}
.footer-row {
	display: flex;
	justify-content: space-between;
}
.footer-widget1 {
	width: 352px;
	padding-right: 70px;
}
.footer-widget1 a img {
	margin-bottom: 5px;
}
.footer-widget1 p {
	margin: 0;
	font-size: 16px;
	line-height: 32px;
}
.footer-widget1 img {
	max-height: 60px;
}
.footer-widget2 {
	width: 220px;
}
.footer-widget3 {
	width: 240px;
}
.footer-row h2 {
	margin-bottom: 25px;
	font-size: 18px;
	font-weight: 600;
	text-transform: uppercase;
	color: #2DB9EB;
}
.footer-widget-list, .footer-widget-list-contact {
	margin: 0;
	padding: 0;
}
.footer-widget-list li, .footer-widget-list-contact {
	list-style: none;
	padding: 9px 0;
}
.footer-widget-list li a, .footer-widget-list-contact a {
	font-size: 16px;
	color: #061829;
	font-weight: 500;
}
.footer-widget-list-contact {
	margin: 0;
	padding: 0;
}
.footer-widget-list-contact a {
	display: flex;
	align-items: flex-start;
	padding: 5px 0;
}
.footer-widget-list-contact a span {
	width: 21px;
	height: 22px;
	background-repeat: no-repeat;
	background-position: center;
	background-size: contain;
	margin-right: 17px;
	margin-top: 5px;
}
.footer-widget-list-contact a span i {
	font-size: 19px;
	color: #2DB9EB;
}
.footer-widget-list li a:hover {
    color: #2DB9EB;
}
.footer-bottom {
	background: #fff;
	border-top: 1px solid #D9D9D9;
	color: #061829;
	padding: 30px 15px;
	text-align: center;
	font-size: 16px;
}
.footer-bottom a {
    color: #061829;
}
.footer-bottom a:hover {
    color: #2DB9EB;
}

@media  only screen and (max-width: 1170px) {
    .header-row, .banner-row, .skills-row, .appointment-title-area .title, .portfolio-area .section-row, .booking-section-title, .testimonial-area .section-title, .testimonial-wrapper, .cta-area .section-row, .footer-row, .footer-bottom-row {
        padding-left: 15px;
        padding-right: 15px;
    }
    .form-wrapper {
        max-width: 100%;
    }
    .skills-boxs-left, .skills-boxs-right {
        width: 50%;
    }
}
@media  only screen and (max-width: 991px) {
    .appointment-area-wrapper {
        flex-wrap: wrap;
    }
    .appointment-left-select {
        width: 100%;
        margin-bottom: 30px;
        margin-left: 15px;
        margin-right: 15px;
    }
    .appointment-select-area {
        border-left: 1px solid #E4E4E4;
    }
    .appointment-right-calender {
        width: 100%;
        margin: 0 15px;
    }
    .calender-area {
        padding-left: 0;
        padding-right: 20px;
    }
    .banner-left {
        width: 100%;
    }
    .banner-right {
        display: none;
    }
    .banner-area {
        height: auto!important;
        padding: 100px 0;
    }
    .law-find-us-bottom {
        flex-wrap: wrap;
    }
    .single-fine-us-block {
        width: 100%;
    }
    .single-fine-us-block-inner {
        padding: 0 15px;
    }
}

@media  only screen and (max-width: 776px) {
    .skills-boxs-wrapper, .form-row-two, .portfolio-items-wrapper, .footer-row {
        flex-wrap: wrap;
    }
    .skills-boxs-left, .skills-boxs-right {
        width: 100%;
        padding-right: 0;
        margin-right: 0;
    }
    .form-row-two input, .form-row-two select {
        width: 100%;
    }
    .portfolio-items-wrapper .portfolio-single {
        width: 100%;
    }
    .footer-widget1, .footer-widget2, .footer-widget3, .footer-widget4 {
        width: 100%;
        padding-right: 0;
        margin-bottom: 30px;
    }
    .cta-area .section-row {
        flex-wrap: wrap;
    }
    .cta-left, .cta-right {
        width: 100%!important;
    }
    .cta-left {
        margin-bottom: 30px;
    }
    .cta-socials-inner {
        justify-content: flex-start!important;
        flex-wrap: wrap;
    }
    .cta-socials-inner a {
        margin-right: 15px;
    }
    .form-row-two {
        gap: 0;
    }
    .form-row-two input:last-child {
        margin-top: 25px;
    }
}

@media  only screen and (max-width: 500px) {
    .appointment-right-calender {
        flex-wrap: wrap;
    }
    .calender-area {
        width: 100%;
        padding-right: 0;
    }
    .calender-buttons {
        width: 100%;
        border: 1px solid #ECECEC;
    }
    .booking-section-title {
        font-size: 20px;
    }
    .single-fine-us-block {
        padding-top: 30px;
        padding-bottom: 30px;
    }
    .skills-button button {
        width: auto;
        padding-right: 30px;
        padding-left: 30px;
    }
    .appointment-title-area {
        margin-top: 0;
    }
    .skills-area {
        padding-bottom: 20px;
    }
    .appointment-title-area .title span {
        font-size: 14px;
    }
    .appointment-title-area .title {
        flex-wrap: wrap;
        width: auto;
    }
    .banner-left-inner .top h5 {
        font-size: 18px;
    }
    .banner-left-inner .top h1 {
    	font-size: 36px!important;
    	line-height: 42px;
    	margin-bottom: 10px!important;
    }
    .banner-left-inner .top p {
        font-size: 16px;
    }
    .banner-left-inner .top {
        margin-bottom: 32px;
    }
    .banner-buttons {
        margin-bottom: 40px!important;
    }
    .banner-socials-inner {
        padding: 20px 0;
    }
}
.result-msg span {
    text-align: center;
    background-color: #2DB9EB;
    color: #fff;
    padding: 15px 0;
    margin-bottom: 16px;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<?php
$iframe = request()->iframe;
if($iframe !="yes") { ?>

    <script type='text/javascript' charset='utf-8'>
    window.onload = function() {
        MIYNLive.init({
    		uid: '{{$uid}}',
    		ui: false,
    		buttonprefix: true,
        	paramName: 'action'
    	});
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0],
            //p = 'https://',
            r = new Date().getDate();// Math.floor((20000000 - 10) * Math.random());
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id; js.setAttribute('crossorigin','anonymous');  js.setAttribute('async','true'); 
        js.src = "{{config('app.live_url')}}/site/js/live-script.js?q=" + r;
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'miynsite-jssdk'));
    </script>

<?php
}
?>


</head>
    <body>
        
        <?php
            if(!empty($miyn_theme_section->fullhtml)){
        ?>
            {!! $miyn_theme_section->fullhtml !!} 
        <?php
            } else {
        ?>
    
        
        
    <header class="header-area sections section" data-section="default" id="header">
         <div class="container">
            <div class="header-row">
                 <div class="header-logo">
                     <img src="{{config('app.apps_url')}}/images/business_logo/{{$global_business_info->logo_image}}" alt="Logo" class="">
                 </div>
                 <div class="header-menu">
                     <nav class="nav-menu-area">
                         <ul class="main-menu">
                             <li><a href="#banner">Home</a></li>
                             <li><a href="#skills" class="">Skills</a></li>
                             <li class=""><a href="#portfolio" class="">Portfolio</a></li>
                             <li class=""><a href="#testimonial" class="">Testimonial</a></li>
                             <li class=""><a href="#find-us" class="">Contact</a></li>
                             <li class=""><button class="login miynacc">Login</button></li>
                         </ul>
                     </nav>
                    <!-- side menu start -->
                    <div class="side-menu-close">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="side-menu-wrap open">

                      <nav class="side-menu-nav">
                        
                      </nav>
                    </div>
                    <!-- side menu end -->
                 </div>
            </div>
         </div>
     </header>
    <section class="banner-area sections section" data-section="default" id="banner" style="background-color: rgb(243, 248, 255); width: auto; height: 744px;">
         <div class="container" style="width: 1140px;height: 100%;">
             <div class="banner-row" style="display: flex;align-items: flex-end;height: 100%;">
                 <div class="banner-left">
                     <div class="banner-left-inner" style="display: flex;flex-direction: column;">
                         <div class="top" style="margin-bottom: 30px;">
                             <h5 class="" style="font-size: 24px;font-weight: 500;text-transform: uppercase;margin-bottom: 8px;">hello, I am Johns Modesto</h5>
                             <h1 class="" style="font-size: 56px;font-weight: 700;color: <?php echo $color_bg; ?>;margin-bottom: 5px;">VISUAL DESIGNER</h1>
                             <p class="" style="margin-bottom: 0px;font-size: 21px;">Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a     malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur.</p>
                         </div>
                         <div class="banner-buttons" style="display: flex;align-items: center;margin-bottom: 200px;">
                             <a href="#" class="blue miynquote">Hire me</a>
                             <a href="#" class="">view cv</a>
                         </div>
                         <div class="banner-socials">
                             <div class="banner-socials-inner">
                                 <a href="#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
                                 <a href="#"><i class="fab fa-behance" aria-hidden="true"></i></a>
                                 <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                 <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                 <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="banner-right">
                     <div class="banner-right-inner" style="height: 100%;width: 670px;background-color: #EFF3FF;">
                         <div class="banner-right-shape">
                             <div class="banner-right-shape-inner"></div>
                         </div>
                         <div class="banner-right-img" style="background-image: url(&quot;https://app.miyn.app/images/gallery/guy1449010666.png&quot;); height: 100%; background-repeat: no-repeat; background-size: contain; background-position: 50% 100%;position: relative;"></div>
                         
                     </div>
                 </div>
             </div>
         </div>
     </section>
    <section class="skills-area sections section" data-section="default" id="skills" style="margin-top: 95px; margin-bottom: 95px;">
         <div class="container">
            <div class="skills-row">
                <div class="section-title">
                    <h2 class="" style="text-align: center;font-size: 31px;font-weight: 700;text-transform: uppercase;color: <?php echo $color_bg; ?>;line-height: 31px;margin-bottom: 80px;">I am SPECIALIZING IN</h2>
                </div>
                <div class="skills-boxs-wrapper" style="display: flex;">
                    <div class="skills-boxs-left">
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-tv"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3 class="">UI/UX</h3>
                                <p class="">Landing Pages, User Flow, Wireframing, Prototyping, Mobile App Desifn.</p>
                            </div>
                        </div>
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3 class="">Branding</h3>
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis.</p>
                            </div>
                        </div>
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3 class="">Motion</h3>
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills-boxs-right">
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-random"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3>Icon/Illustration</h3>
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis.</p>
                            </div>
                        </div>
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-tablet-alt"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3 class="">App Design</h3>
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis.</p>
                            </div>
                        </div>
                        <div class="skills-box-single">
                            <div class="left">
                                <div class="icon">
                                    <i class="fas fa-file-code"></i>
                                </div>
                            </div>
                            <div class="right">
                                <h3 class="">Development</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <section class="appointment-area sections section" data-section="default" id="appointment">
        <div class="container">
               <div class="appointment-title-area">
                   <div class="title">
                       <img src="{{asset('themes/free-launcher/img/calendar.png')}}" alt="icon">
                       <span>Appointment To Johns Modesto</span>
                   </div>
               </div>
            <div class="appointment-area-wrapper" id="appointment-area-wrapper">
                
            </div>
        </div>
    </section> 
    <section class="contact-area sections section" data-section="default" id="contact" data-type="dynamic" data-name="contactinfo" style="padding-bottom: 80px;">
        <div class="container">
            <div class="form-wrapper">
                <h2 class="section-title" style="text-align: center;font-size: 31px;font-weight: 700;text-transform: uppercase;color: <?php echo $color_bg; ?>;margin: 0;line-height: 31px;margin-bottom: 40px;">Make an Enquiry</h2>
                <div id="contactform" class="dynamic-content">
                            
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-area sections section" data-section="default" id="portfolio" style="padding-top: 100px;padding-bottom: 80px;background-color: #F3F8FF;">
        <div class="container">
            <div class="section-row">
                <div class="section-title">
                    <h2 style="text-align: center;font-size: 38px;font-weight: 700;text-transform: uppercase;color: <?php echo $color_bg; ?>;margin: 0;line-height: 31px;margin-bottom: 70px;" class="">The work I do and business I help</h2>
                </div>
                <div class="portfolio-items-wrapper">
                    <div class="portfolio-single">
                        <div class="image">
                            <div class="image-inner" style="background-image: url(&quot;https://app.miyn.app/images/gallery/portfolio11271228268.png&quot;);"></div>
                        </div>
                        <h2 class="">UV-C</h2>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis metus at efficitur efficitur. Quisque pellentesque ligula nulla</p>
                    </div>
                    <div class="portfolio-single">
                        <div class="image">
                            <div class="image-inner" style="background-image: url(&quot;https://app.miyn.app/images/gallery/portfolio21846040411.png&quot;);"></div>
                        </div>
                        <h2 class="">booking once</h2>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis metus at efficitur efficitur. Quisque pellentesque ligula nulla</p>
                    </div>
                    <div class="portfolio-single">
                        <div class="image">
                            <div class="image-inner" style="background-image: url(&quot;https://app.miyn.app/images/gallery/portfolio3657727337.png&quot;);"></div>
                        </div>
                        <h2>Global listing</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis metus at efficitur efficitur. Quisque pellentesque ligula nulla</p>
                    </div>
                    <div class="portfolio-single">
                        <div class="image">
                            <div class="image-inner" style="background-image: url(&quot;https://app.miyn.app/images/gallery/portfolio11271228268.png&quot;);"></div>
                        </div>
                        <h2>UV-C</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis metus at efficitur efficitur. Quisque pellentesque ligula nulla</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="booking-section-title-area sections section" data-section="default" id="find-us-header" style="padding-top: 40px;padding-bottom: 40px;background-color: <?php echo $color_bg; ?>;">
        <div class="container">
            <div class="section-row">
                <div class="booking-section-title" style="display: flex;align-items: center;justify-content: center;font-size: 32px;font-weight: 700;color: #fff;text-transform: uppercase;">
                    <img src="https://app.miyn.app/images/gallery/phone-book578370336.png" alt="Icon" class="" style="margin-right: 17px;">
                    <span class="">contact me in your suitable way</span>
                </div>
            </div>
        </div>
    </section>
    <section class="law-find-us sections section" data-section="default" data-type="dynamic" id="find-us" data-name="widgetbutton">
        <div class="container">
            <div id="widgetbuttons-area" class="col-md-12 law-find-us-bottom dynamic-content">
                        
            </div>
        </div>
    </section>
    <section class="testimonial-area sections section" data-section="default" id="testimonial">
        <div class="container">
            <div class="section-title">
                <h2 style="text-align: center;font-size: 31px;font-weight: 700;text-transform: uppercase;color: <?php echo $color_bg; ?>;line-height: 31px;margin-bottom: 10px;">What my clients say about me</h2>
            </div>
            <div class="testimonial-wrapper"> 
                <div class="testmonial-items owl-carousel" data-prev="{{asset('themes/free-launcher/img/tes-left.png')}}" data-next="{{asset('themes/free-launcher/img/tes-right.png')}}">
                    <div class="testimonial-single">
                       <div class="testimonial-single-inner">
                            <div class="avatar" style="background-image: url({{asset('themes/free-launcher/img/tes1.png')}})"></div>
                            <h3>Josianne McLaughlin</h3>
                            <p>“Our call phones are with us all the time. We use them to look up dosages, communicate with staff and more.”</p>
                            <div class="locationn">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Manager, Apollo Hospital</span>
                            </div>
                       </div>
                    </div>
                    <div class="testimonial-single">
                       <div class="testimonial-single-inner">
                            <div class="avatar" style="background-image: url({{asset('themes/free-launcher/img/tes1.png')}})"></div>
                            <h3>Josianne McLaughlin</h3>
                            <p>“Our call phones are with us all the time. We use them to look up dosages, communicate with staff and more.”</p>
                            <div class="locationn">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Manager, Apollo Hospital</span>
                            </div>
                       </div>
                    </div>
                    <div class="testimonial-single">
                       <div class="testimonial-single-inner">
                            <div class="avatar" style="background-image: url({{asset('themes/free-launcher/img/tes2.png')}})"></div>
                            <h3>Josianne McLaughlin</h3>
                            <p>“Our call phones are with us all the time. We use them to look up dosages, communicate with staff and more.”</p>
                            <div class="locationn">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Manager, G3 Tech</span>
                            </div>
                       </div>
                    </div>
                    <div class="testimonial-single">
                       <div class="testimonial-single-inner">
                            <div class="avatar" style="background-image: url({{asset('themes/free-launcher/img/tes3.png')}})"></div>
                            <h3>Rosario Lynch</h3>
                            <p>“Our call phones are with us all the time. We use them to look up dosages, communicate with staff and more.”</p>
                            <div class="locationn">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Manager, Apollo Hospital</span>
                            </div>
                       </div>
                    </div>
                    <div class="testimonial-single">
                       <div class="testimonial-single-inner">
                            <div class="avatar" style="background-image: url({{asset('themes/free-launcher/img/tes1.png')}})"></div>
                            <h3>Josianne McLaughlin</h3>
                            <p>“Our call phones are with us all the time. We use them to look up dosages, communicate with staff and more.”</p>
                            <div class="locationn">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Manager, Apollo Hospital</span>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-area sections section" data-section="default" id="cta" style="padding-top: 30px;padding-bottom: 30px;background-color: #E5F3FF;">
        <div class="container">
            <div class="section-row" style="display: flex;align-items: center;justify-content: space-between;">
                <div class="cta-left" style="width: 50%;">
                    <p class="" style="font-size: 20px;font-weight: 600;margin-bottom: 7px;">Interested work with me? </p>
                    <a href="#" class="" style="font-size: 20px;color: <?php echo $color_bg; ?>;font-weight: 600;transition: all .5s;">Contact me <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="cta-right" style="display: flex;flex-direction: column;align-items: flex-start;width: 230px;">
                    <h4 class="" style="font-size: 20px;font-weight: 600;margin-bottom: 7px;">Follow me-</h4>
                    <div class="cta-socials-inner" style="width: 100%;display: flex;align-items: center;justify-content: space-between;">
                        <a href="#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#" class=""><i class="fab fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#" class=""><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class=""><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area sections section" data-section="default" id="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-widget1">
                    <a><img src="{{config('app.apps_url')}}/images/business_logo/{{$global_business_info->logo_image}}" alt="Logo" class=""></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis metus at efficitur efficitur. Quisque pellentesque ligula nulla, et gravida diam auctor ut. Sed ac diam felis. Nam at mollis enim, eget rhoncus diam.</p>
                </div>
                <div class="footer-widget2">
                    <h2>Discover</h2>
                    <ul class="footer-widget-list">
                        <li><a href="#">UI/UX</a></li>
                        <li><a href="#">Branding</a></li>
                        <li><a href="#">Motion</a></li>
                        <li><a href="#">App Design</a></li>
                        <li><a href="#">Icon/Illustration</a></li>
                    </ul>
                </div>
                <div class="footer-widget3">
                    <h2>Help</h2>
                    <ul class="footer-widget-list">
                         <li><a href="#banner">Home</a></li>
                         <li><a href="#skills" class="">Skills</a></li>
                         <li class=""><a href="#portfolio" class="">Portfolio</a></li>
                         <li class=""><a href="#testimonial" class="">Testimonial</a></li>
                         <li class=""><a href="#find-us" class="">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-widget4">
                    <h2>Keep in touch</h2>
                    <ul class="footer-widget-list-contact">
                        <li><a href="javascript:void(0)"><span><i class="fas fa-map-marker-alt"></i></span>Surfers Paradise, QLD,4217 <br/>AUSTRALIA</a></li>
                        <li><a href="{{config('app.main_url')}}"><span><i class="fas fa-globe"></i></span>{{config('app.main_url')}}</a></li>
                        <li><a href="mailto:support@miyn.app"><span><i class="far fa-envelope"></i></span>support@miyn.app</a></li>
                        <li><a href="tel:+477937937"><span><i class="fas fa-phone"></i></span>+477937937</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer-bottom sections section" data-section="default" id="footer-bottom">
        <div class="container">
            <div class="footer-bottom-row">
                Copyright All Rights Reserved ©<?php echo date('Y'); ?> | <a href="{{config('app.main_url')}}">MIYN</a> Lead Generation.
            </div>
        </div>
    </footer>        
        
        
        
        
        
        <?php
            } 
        ?>

    </body>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
    // auto generated side menu from top header menu start
      var topHeaderMenu = $('header nav > ul').clone();
      var sideMenu = $('.side-menu-wrap nav');
      sideMenu.append(topHeaderMenu);
      if ($(sideMenu).find('.sub-menu').length != 0) {
        $(sideMenu).find('.sub-menu').parent().append('<i class="fas fa-chevron-right d-flex align-items-center"></i>');
      }
      // auto generated side menu from top header menu end
    
      // close menu when clicked on menu link start
      // $('.side-menu-wrap nav > ul > li > a').on('click', function () {
      //   sideMenuCloseAction();
      // });
      // close menu when clicked on menu link end
    
      // open close sub menu of side menu start
      var sideMenuList = $('.side-menu-wrap nav > ul > li > i');
      $(sideMenuList).on('click', function () {
        if (!($(this).siblings('.sub-menu').hasClass('d-block'))) {
          $(this).siblings('.sub-menu').addClass('d-block');
        } else {
          $(this).siblings('.sub-menu').removeClass('d-block');
        }
      });
      // open close sub menu of side menu end
    
      // side menu close start
      $('.side-menu-close').on('click', function () {
        if (!($('.side-menu-close').hasClass('closed'))) {
          $('.side-menu-close').addClass('closed');
        } else {
          $('.side-menu-close').removeClass('closed');
        }
      });
      // side menu close end
    
      // auto append overlay to body start
      $('.wrapper').append('<div class="custom-overlay h-100 w-100"></div>');
      // auto append overlay to body end
    
      // open side menu when clicked on menu button start
      $('.side-menu-close').on('click', function () {
        if (!($('.side-menu-wrap').hasClass('opened')) && !($('.custom-overlay').hasClass('show'))) {
          $('.side-menu-wrap').addClass('opened');
          $('.custom-overlay').addClass('show');
        } else {
          $('.side-menu-wrap').removeClass('opened');
          $('.custom-overlay').removeClass('show');
        }
      })
      // open side menu when clicked on menu button end
    
      // close side menu when clicked on overlay start
      $('.custom-overlay').on('click', function () {
        sideMenuCloseAction();
      });
    // close side menu when clicked on overlay end
    
    // close side menu when swiped start
    var isDragging = false, initialOffset = 0, finalOffset = 0;
    $(".side-menu-wrap")
    .mousedown(function(e) {
        isDragging = false;
      initialOffset = e.offsetX;
    })
    .mousemove(function() {
        isDragging = true;
     })
    .mouseup(function(e) {
        var wasDragging = isDragging;
        isDragging = false;
      finalOffset = e.offsetX;
        if (wasDragging) {
            if(initialOffset>finalOffset) {
               sideMenuCloseAction();
               }
        }
    });
    // close side menu when swiped end
    
    
      function sideMenuCloseAction() {
        $('.side-menu-wrap').addClass('open');
        $('.wrapper').addClass('freeze');
        $('.custom-overlay').removeClass('show');
        $('.side-menu-wrap').removeClass('opened');
        $('.side-menu-close').removeClass('closed');
        $(sideMenuList).siblings('.sub-menu').removeClass('d-block');
      }
      // close side menu when clicked on overlay end
    
      // close side menu over 992px start
        $(window).on('resize', function() {
            if($(window).width() >= 992) {
                sideMenuCloseAction();
            }
        })
        // close side menu over 992px end
         
          $(".testmonial-items").owlCarousel({
        	  loop: false,
               nav:true,
               navText: ['<img src="'+$('.testmonial-items').attr('data-prev')+'" alt="prev">','<img src="'+$('.testmonial-items').attr('data-next')+'" alt="next">'],
        	  autoplay: false,
        	  margin:0,
        	  dots:false,
              margin:40,
          	  responsive:{
            0:{
                items:1
            },
            991:{
                items:3
            },
          }
          });
         
    </script>
    

    
<script>

 var formloaded = 0;

if (MIYNBuilder === undefined) var MIYNBuilder = {};

MIYNBuilder.apiurl              =  "https://api.miyn.app";
MIYNBuilder.appurl              =  "https://app.miyn.app";
MIYNBuilder.liveurl             =  "https://live.miyn.app";

MIYNBuilder.uid = '{{$global_business_info->uid}}';


MIYNBuilder.Builder = {
    
	
	init: function(callback) {
	    
	    //console.log('MIYNBuilder.Builder.init');

		var self = this;
		
		(async () => {
           let response = await fetch(MIYNBuilder.apiurl +'/api/business_info/'+MIYNBuilder.uid);
           let apiinfo = await response.json();
           console.log(apiinfo);
           
            var   alldata       =  JSON.stringify(apiinfo);
            MIYNBuilder.apidata = JSON.parse(alldata);
            
            //console.log(typeof MIYNBuilder.apidata);
            MIYNBuilder.commonimage     = MIYNBuilder.apidata.common_images;
            MIYNBuilder.businessimage   = MIYNBuilder.apidata.business_images;

    		//self.loadControlGroups();
    		//self.loadBlockGroups();
    		MIYNBuilder.photo_upload_url    =  MIYNBuilder.appurl + "/app/image-gallery/" + MIYNBuilder.apidata.id;
    		
    		self.selectedEl = null;
    		self.highlightEl = null;
    		self.initCallback = callback;
    		
            self.documentFrame = $(this);
            //self.canvas = $("#canvas");
    
    		self._loadIframe();
    		//MIYNBuilder.Sections.loadSections();
    		
    		//self._initDragdrop();
    		
    		//self._initBox();
           
        })();
        
	},
	
	
	loadteam : function() {
	    
	    (async () => {
          //let response = await fetch('https://api.miyn.app/api/business_info/100420125lrk0cmjy96o72hi');
          //let apiinfo = await response.json();
          
          //return  apiinfo;
        })();
        
        
	    
	},

  SVGIcons : function(typeoficon) {
        var svg = '';

    switch (typeoficon) {
      case 'schedule':
        console.log('schedule.');

  svg = `<svg class="roundedicon-schedule" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="91.95px"
   height="100px" viewBox="0 0 91.95 100" style="enable-background:new 0 0 91.95 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-schedule {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-schedule path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
  <path d="M63.22,10.62V3.45c0-1.89-1.56-3.45-3.45-3.45c-1.89,0-3.45,1.56-3.45,3.45v6.9H26.44v-6.9c0-1.89-1.56-3.45-3.45-3.45
    c-1.89,0-3.45,1.56-3.45,3.45v7.17C7.13,11.77,1.1,19.17,0.18,30.16c-0.09,1.33,1.01,2.44,2.3,2.44h77.79
    c1.33,0,2.44-1.15,2.3-2.44C81.66,19.17,75.63,11.77,63.22,10.62z"/>
  <path d="M73.56,63.22c-10.16,0-18.39,8.23-18.39,18.39c0,3.45,0.97,6.71,2.67,9.47c3.17,5.33,9.01,8.92,15.72,8.92
    s12.55-3.59,15.72-8.92c1.7-2.76,2.67-6.02,2.67-9.47C91.95,71.45,83.72,63.22,73.56,63.22z M83.08,79.63l-9.79,9.06
    c-0.64,0.6-1.52,0.92-2.34,0.92c-0.87,0-1.75-0.32-2.44-1.01l-4.55-4.55c-1.33-1.33-1.33-3.54,0-4.87c1.33-1.33,3.54-1.33,4.87,0
    l2.21,2.21l7.36-6.8c1.38-1.29,3.59-1.2,4.87,0.18C84.55,76.14,84.46,78.3,83.08,79.63z"/>
  <path d="M78.16,39.49H4.6c-2.53,0-4.6,2.07-4.6,4.6v28.32C0,86.21,6.9,95.4,22.99,95.4h22.67c3.17,0,5.38-3.08,4.37-6.07
    c-0.92-2.67-1.7-5.61-1.7-7.72c0-13.93,11.36-25.29,25.29-25.29c1.33,0,2.67,0.09,3.95,0.32c2.76,0.41,5.24-1.75,5.24-4.51v-8
    C82.76,41.56,80.69,39.49,78.16,39.49z M28.55,77.98c-0.87,0.83-2.07,1.33-3.26,1.33c-1.2,0-2.39-0.51-3.26-1.33
    c-0.83-0.87-1.33-2.07-1.33-3.26s0.51-2.39,1.33-3.26c0.46-0.41,0.92-0.74,1.52-0.97c1.7-0.74,3.72-0.32,5.01,0.97
    c0.83,0.87,1.33,2.07,1.33,3.26S29.38,77.1,28.55,77.98z M28.55,61.88c-0.23,0.18-0.46,0.37-0.69,0.55
    c-0.28,0.18-0.55,0.32-0.83,0.41c-0.28,0.14-0.55,0.23-0.83,0.28c-0.32,0.05-0.64,0.09-0.92,0.09c-1.2,0-2.39-0.51-3.26-1.33
    c-0.83-0.87-1.33-2.07-1.33-3.26c0-1.2,0.51-2.39,1.33-3.26c1.06-1.06,2.67-1.56,4.18-1.24c0.28,0.05,0.55,0.14,0.83,0.28
    c0.28,0.09,0.55,0.23,0.83,0.41c0.23,0.18,0.46,0.37,0.69,0.55c0.83,0.87,1.33,2.07,1.33,3.26C29.89,59.82,29.38,61.01,28.55,61.88
    z M44.64,61.88c-0.87,0.83-2.07,1.33-3.26,1.33s-2.39-0.51-3.26-1.33c-0.83-0.87-1.33-2.07-1.33-3.26c0-1.2,0.51-2.39,1.33-3.26
    c1.75-1.7,4.83-1.7,6.53,0c0.83,0.87,1.33,2.07,1.33,3.26C45.98,59.82,45.47,61.01,44.64,61.88z"/>
</g>
</svg>
`;  

        break;
      case 'call':
        console.log('call.');

 svg = `<svg class="roundedicon-call" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="71.68px"
   height="100px" viewBox="0 0 71.68 100" style="enable-background:new 0 0 71.68 100;" xml:space="preserve">
   <style type="text/css">
 svg.roundedicon-call {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-call path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M61.99,99.86C17.74,89.7-7.97,47.96,2.22,4.14c0.66-2.86,3.52-4.66,6.39-4L22.29,3.3c2.57,0.59,4.31,2.99,4.1,5.61
  c-0.5,6.3-0.1,12.64,1.19,18.82l0.27,1.27c0.37,1.77-0.57,3.55-2.24,4.25c-4.94,2.05-7.96,7.76-5.76,13.28
  c2.76,6.92,6.78,13.35,11.78,18.87c3.99,4.4,10.45,4.19,14.46,0.65c1.36-1.2,3.37-1.26,4.8-0.15l1.02,0.8
  c4.99,3.88,10.51,7.03,16.39,9.34c2.45,0.96,3.84,3.58,3.24,6.15l-3.16,13.68C67.72,98.74,64.86,100.52,61.99,99.86L61.99,99.86z"/>
</svg>`;  




        break;
      case 'file':
        console.log('file.');

svg = `<svg class="roundedicon-file" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="105.29px" height="99.54px" viewBox="0 0 105.29 99.54" style="enable-background:new 0 0 105.29 99.54;"
   xml:space="preserve">
<style type="text/css">
 svg.roundedicon-file {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-file path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
  <path d="M95.6,24.39c-3.81-3.81-9.62-4.31-20.31-4.38L60.58,34.72L60.29,35c-1.14,1.16-2.38,2.41-4.02,3.08
    c-1.63,0.68-3.39,0.67-5.02,0.67H0V60c0,14.14,0,21.21,4.39,25.6C8.78,90,15.85,90,30,90l26.93,0c1.78,0,3.13-1.56,2.9-3.32
    c-0.5-3.83-0.23-7.9,0.89-12.04c2.37-8.78,8.99-15.92,17.61-18.81c6.33-2.12,12.5-2.15,17.99-0.58c1.85,0.53,3.68-0.92,3.68-2.84
    c0-1.3,0-2.4,0-2.4C100,35.86,100,28.79,95.6,24.39z M61.18,20c-3.01,0-4.51,0-5.72-0.75c-1.21-0.75-1.88-2.09-3.23-4.78
    l-1.71-3.42c-2.69-5.38-4.03-8.06-6.45-9.56C41.66,0,38.65,0,32.63,0H20C10.57,0,5.85,0,2.92,2.93C0,5.86,0,10.57,0,20v11.25h50.85
    c1.08,0,1.68,0,2.13-0.04c0.2-0.01,0.31-0.03,0.37-0.04c0.03-0.01,0.04-0.01,0.05-0.01v-0.01h0.01l0.01-0.01l0.03-0.01
    c0.05-0.04,0.14-0.1,0.29-0.23c0.34-0.3,0.77-0.72,1.53-1.48L64.69,20H61.18z"/>
  <path d="M86.21,61.37c-10.54,0-19.08,8.54-19.08,19.08c0,3.58,1,6.96,2.77,9.83c3.29,5.53,9.35,9.25,16.31,9.25
    s13.02-3.72,16.31-9.25c1.76-2.86,2.77-6.25,2.77-9.83C105.29,69.91,96.75,61.37,86.21,61.37z M99.81,78.9l-8.82,9.16
    c-0.29,0.3-0.73,0.39-1.11,0.24c-0.39-0.15-0.64-0.53-0.64-0.94v-4.41h-1.61c-4.27,0-8.11,2.37-10.02,6.19
    c-0.18,0.35-0.55,0.58-0.93,0.58c-0.07,0-0.15-0.01-0.22-0.03c-0.46-0.11-0.79-0.5-0.79-0.97v-2.04c0-7.3,5.94-13.24,13.24-13.24
    h0.34v-4.41c0-0.42,0.25-0.79,0.64-0.94c0.38-0.15,0.83-0.06,1.11,0.24l8.82,9.16C100.19,77.88,100.19,78.5,99.81,78.9z"/>
</g>
</svg>
`;  


        break;
      case 'quote':
        console.log('quote.');

svg = `<svg class="roundedicon-quote" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="115.65px" height="115.63px" viewBox="0 0 115.65 115.63" style="enable-background:new 0 0 115.65 115.63;"
   xml:space="preserve">
<style type="text/css">
 svg.roundedicon-quote {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-quote path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
  <path d="M88.33,43.83c-8.14-1.76-14.77-8.4-16.54-16.54c-0.67-3.16-0.73-6.22-0.16-9.12c0.67-3.21-1.71-6.22-5.03-6.22H25.92
    C11.61,11.95,0,23.57,0,37.87V73.9c0,14.31,11.61,25.92,25.92,25.92h7.78c1.45,0,3.32,0.93,4.15,2.07l7.78,10.32
    c3.42,4.56,9.02,4.56,12.44,0l7.78-10.32c0.98-1.3,2.49-2.07,4.15-2.07h7.83c14.31,0,25.87-11.56,25.87-25.87V49.02
    c0-3.27-3.01-5.65-6.22-5.03C94.55,44.51,91.49,44.51,88.33,43.83z M31.1,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
    c2.85,0,5.18,2.33,5.18,5.18S34.01,63.79,31.1,63.79z M51.84,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
    c2.85,0,5.18,2.33,5.18,5.18S54.74,63.79,51.84,63.79z M72.57,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
    c2.85,0,5.18,2.33,5.18,5.18S75.48,63.79,72.57,63.79z"/>
  <path d="M95.59,0C84.51,0,75.53,8.98,75.53,20.06c0,11.08,8.98,20.06,20.06,20.06c11.08,0,20.06-8.98,20.06-20.06
    C115.65,8.98,106.67,0,95.59,0z M93.31,25.33c-0.76,0.68-1.73,1.02-2.9,1.02c-1.37,0-2.51-0.45-3.4-1.36
    c-0.89-0.91-1.33-2.24-1.33-4.01c0-1.66,0.24-3.09,0.73-4.27c0.48-1.18,1.07-2.19,1.76-3.03c0.69-0.83,1.4-1.5,2.14-2
    c0.74-0.5,1.39-0.86,1.95-1.06l1.89,2.65c-1.12,0.56-2.02,1.3-2.71,2.23c-0.69,0.93-1.03,2.11-1.03,3.52
    c0.2-0.05,0.48-0.08,0.84-0.08c1.02,0,1.8,0.35,2.36,1.06c0.56,0.71,0.84,1.56,0.84,2.57C94.46,23.73,94.08,24.65,93.31,25.33z
     M104.35,25.33c-0.76,0.68-1.73,1.02-2.9,1.02c-1.37,0-2.51-0.45-3.4-1.36c-0.89-0.91-1.33-2.24-1.33-4.01
    c0-1.66,0.24-3.09,0.73-4.27c0.48-1.18,1.07-2.19,1.76-3.03c0.69-0.83,1.4-1.5,2.14-2c0.74-0.5,1.39-0.86,1.95-1.06l1.89,2.65
    c-1.12,0.56-2.02,1.3-2.71,2.23c-0.69,0.93-1.03,2.11-1.03,3.52c0.2-0.05,0.48-0.08,0.84-0.08c1.02,0,1.8,0.35,2.36,1.06
    c0.56,0.71,0.84,1.56,0.84,2.57C105.5,23.73,105.12,24.65,104.35,25.33z"/>
</g>
</svg>

`;  


        break;
      case 'greeting':
        console.log('greeting.');


svg = `<svg class="roundedicon-greeting" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px"
   height="100px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-greeting {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-greeting path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M70,0H30C10,0,0,10,0,30v65c0,2.75,2.25,5,5,5h65c20,0,30-10,30-30V30C100,10,90,0,70,0z M60,66.25H25
  c-2.05,0-3.75-1.7-3.75-3.75c0-2.05,1.7-3.75,3.75-3.75h35c2.05,0,3.75,1.7,3.75,3.75C63.75,64.55,62.05,66.25,60,66.25z M75,41.25
  H25c-2.05,0-3.75-1.7-3.75-3.75s1.7-3.75,3.75-3.75h50c2.05,0,3.75,1.7,3.75,3.75S77.05,41.25,75,41.25z"/>
</svg>
`;  


        break;
      case 'googlemap':
        console.log('googlemap.');


svg = `<svg class="roundedicon-googlemap" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="77.76px"
   height="100px" viewBox="0 0 77.76 100" style="enable-background:new 0 0 77.76 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-googlemap {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-googlemap path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M38.88,100c-7.02-5.98-13.52-12.54-19.44-19.61C10.55,69.77,0,53.97,0,38.9C-0.01,23.17,9.47,8.98,24,2.96
  c14.53-6.02,31.27-2.69,42.39,8.44c7.31,7.28,11.41,17.18,11.38,27.5c0,15.06-10.55,30.87-19.44,41.49
  C52.4,87.46,45.9,94.02,38.88,100z M38.88,22.24c-5.95,0-11.45,3.18-14.43,8.33c-2.98,5.16-2.98,11.51,0,16.66
  c2.98,5.16,8.48,8.33,14.43,8.33c9.2,0,16.66-7.46,16.66-16.66C55.54,29.7,48.08,22.24,38.88,22.24z"/>
</svg>
`;




        break;
       case 'chat':
        console.log('chat.');

  svg = `<svg class="roundedicon-chat" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 87.65" style="enable-background:new 0 0 100 87.65;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-chat {
    width:20px;
    height:20px;
 
 }
svg.roundedicon-chat path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
  <path d="M69.15,0H11.31C5.07,0,0,5.07,0,11.31v50.68c0,2.4,2.71,3.75,4.63,2.38l16.11-11.49c1.35-0.96,2.94-1.47,4.6-1.47h35.43
    c6.24,0,11.31-5.07,11.31-11.31V2.93C72.08,1.31,70.76,0,69.15,0z M54.92,35.49H21.07c-1.62,0-2.93-1.31-2.93-2.93
    c0-1.62,1.31-2.93,2.93-2.93h33.85c1.62,0,2.93,1.31,2.93,2.93C57.85,34.18,56.53,35.49,54.92,35.49z M54.92,21.82H21.07
    c-1.62,0-2.93-1.31-2.93-2.93c0-1.62,1.31-2.93,2.93-2.93h33.85c1.62,0,2.93,1.31,2.93,2.93C57.85,20.51,56.53,21.82,54.92,21.82z"
    />
  <path d="M100,34.03v50.68c0,2.38-2.7,3.76-4.63,2.38L79.26,75.61c-1.35-0.96-2.94-1.47-4.6-1.47H39.23
    c-6.24,0-11.31-5.07-11.31-11.31v-5.55h32.84c9.47,0,17.17-7.7,17.17-17.17V22.72h10.76C94.93,22.72,100,27.8,100,34.03L100,34.03z
    "/>
</g>
</svg>`;



        break;
      default:
        console.log(`Sorry, we are out of ${expr}.`);
    }

        return svg
    },
	

/* iframe */
	_loadIframe : function() {	
	    
	    //console.log('MIYNBuilder.Builder._loadIframe');

		var self = this;

	    //return this.documentFrame.on("load", function() 
        //{
				window.FrameWindow = self;
				window.FrameDocument = self.document;
			
				//MIYNBuilder.WysiwygEditor.init(window.FrameDocument);
				//MIYNBuilder.Sections.loadSections();
				MIYNBuilder.Sections.loadDynamicData();
        //});		
        
	},	
    

    _getElementType: function(el) {
		
		//search for component attribute
		componentName = '';  
		   
		if (el.attributes)
		for (var j = 0; j < el.attributes.length; j++){
			
		  if (el.attributes[j].nodeName.indexOf('data-component') > -1)	
		  {
			componentName = el.attributes[j].nodeName.replace('data-component-', '');	
		  }
		}
		
		if (componentName != '') return componentName;

		return el.tagName;
	},
	
	_getElementSelect: function(el, dataattr) {
	    
	    componentName = ''; 
	    
	    if (el.attributes)
	    for (var j = 0; j < el.attributes.length; j++){
			//console.log(el.attributes[j].nodeName);
		  if (el.attributes[j].nodeName.indexOf('data-type') > -1)	
		  {
			componentName = $(el).attr( dataattr );
			//console.log(componentName);
		  }
		}

		return componentName;
	},
	
	loadNodeComponent:  function(node) {
	    
	    //console.log('MIYNBuilder.Builder.loadNodeComponent');
	 
		data = MIYNBuilder.Components.matchNode(node);
		var component;
		
		if (data) 
			component = data.type;
		else 
			component = MIYNBuilder.defaultComponent;
			
		MIYNBuilder.Components.render(component);

	},
	
};

MIYNBuilder.Sections = {
	
	selector: '.sections',
	
	getSections: function() {
	    
	    //console.log('MIYNBuilder.Sections.getSections');
		var sections = [];
		var sectionList = 
			$('> section, > header, > footer', $('body'));
		
		sectionList.each(function (i, node) {

			var section = {
				name: node.id.replace(/[^\w+]+/g,' '),
				id: node.id,
				type: node.tagName.toLowerCase(),
				node: node
			};
			sections.push(section);
			
		});

		return sections;
	},
	
	addSection: function(data) {
	    //console.log('MIYNBuilder.Sections.addSection');
		//console.log(data);
		var section = $(tmpl("vvveb-section", data));
		section.data("node", data.node);
		$(this.selector).append(section);
	},

	loadSections: function() {

	    //console.log('MIYNBuilder.Sections.loadSections');
		var sections = this.getSections();
		console.log(sections);
		
		$(this.selector).html("");
		for (i in sections) {
			this.addSection(sections[i]);
		}
		
		//MIYNBuilder.apidata
		
		//this.init();
	},
	
	
	loadDynamicData: function() {

	    //console.log('MIYNBuilder.Sections.loadDynamicData');
		var sections = this.getSections();
		console.log(sections);
		
		
		for (i in sections) {
		    //console.log(sections[i].node);
            //$(sections[i].node).find('#teamsection').html("teamsection");
            
            var sectionnode = sections[i].node;
            
		    if(MIYNBuilder.Builder._getElementSelect(sections[i].node, 'data-type') == 'dynamic') {
		        
		        //console.log(sections[i].node);
		        var dataname = MIYNBuilder.Builder._getElementSelect(sections[i].node, 'data-name');
		        
		        if(dataname === "team") {
		            //console.log(sections[i].node);
		             $(sectionnode).find('#teamsection').html("");
		            for(var i = 0; i < MIYNBuilder.apidata.staffs.length; i++) {
		                
		                    var speciality = "";
		                    //console.log(JSON.stringify(MIYNBuilder.apidata.staffs[i].staffspeciality));
		                    if(JSON.stringify(MIYNBuilder.apidata.staffs[i].staffspeciality) !="null") {
		                        speciality = JSON.stringify(MIYNBuilder.apidata.staffs[i].staffspeciality);
		                    } else {
		                        speciality = "";
		                    }
		                    
		                    var html = '<div class="law-team-single">';
                                html += '<div class="team-img" style="background-image: url('+MIYNBuilder.appurl+'/images/staff/'+MIYNBuilder.apidata.staffs[i].staff_image+')"></div>';
                                    html += '<div class="team-content">';
                                        html += '<h2>'+MIYNBuilder.apidata.staffs[i].staffname+'</h2>';
                                        html += '<p>'+MIYNBuilder.apidata.staffs[i].staffproffesion+'</p>';
                                        html += '<p class="team-buttons">'+ speciality +'</p>';
                                html += '</div>';
                            html += '</div>';
                            
                            
                           
                            //var html = '<div class="team-single"><div class="avater" style="background-image: url(https://app.miyn.app/images/staff/'+MIYNBuilder.apidata.staffs[i].staff_image+')"></div><h4>'+MIYNBuilder.apidata.staffs[i].staffname+'</h4><span class="email-ids">'+MIYNBuilder.apidata.staffs[i].staffproffesion+'</span><p>'+ speciality +'</p><div>';
                            $(sectionnode).find('#teamsection').append(html)

                    }
		        }
		        
		        if(dataname === "contactinfo") {
		            //console.log(sections[i].node);
		            
		                    $(sectionnode).find('#contactform').html("");
		           
                            var html = `<form action="#" id="contactform-submit-custom" name="contactform-submit-custom">
                                <div class="form-row-one">
                                    <div class="result-msg"></div>
                                </div>
                                <div class="form-row-two">
                                    <input type="text" id="c_first_name" name="c_first_name" placeholder="First Name" required>
                                    <input type="text" id="c_last_name" name="c_last_name" placeholder="Last Name" required>
                                </div>
                                <div class="form-row">
                                    <input type="email" id="c_email" name="c_email" placeholder="Enter Email Address" required>
                                </div>
                                <div class="form-row-two">

                                <select id="client_country_id" name="client_country_id" class="valid" aria-invalid="false" required>
                                            <option value="">Select Country...</option>
                                            <option value="193" data-selectedzoneid="193" data-selectedzonename="Asia/Kabul">Afghanistan (93)</option>
                                            <option value="201" data-selectedzoneid="201" data-selectedzonename="Europe/Mariehamn">Aland Islands (358)</option>
                                            <option value="202" data-selectedzoneid="202" data-selectedzonename="Europe/Tirane">Albania (355)</option>
                                            <option value="40" data-selectedzoneid="40" data-selectedzonename="Africa/Algiers">Algeria (213)</option>
                                            <option value="203" data-selectedzoneid="203" data-selectedzonename="Pacific/Pago_Pago">American Samoa (1)</option>
                                            <option value="91" data-selectedzoneid="91" data-selectedzonename="Europe/Andorra">Andorra (376)</option>
                                            <option value="14" data-selectedzoneid="14" data-selectedzonename="Africa/Luanda">Angola (244)</option>
                                            <option value="204" data-selectedzoneid="204" data-selectedzonename="America/Anguilla">Anguilla (1)</option>
                                            <option value="205" data-selectedzoneid="205" data-selectedzonename="Antarctica/Palmer">Antarctica (672)</option>
                                            <option value="206" data-selectedzoneid="206" data-selectedzonename="America/Antigua">Antigua and Barbuda (1)</option>
                                            <option value="186" data-selectedzoneid="186" data-selectedzonename="America/Argentina/Buenos_Aires">Argentina (54)</option>
                                            <option value="15" data-selectedzoneid="15" data-selectedzonename="Asia/Yerevan">Armenia (374)</option>
                                            <option value="172" data-selectedzoneid="172" data-selectedzonename="America/Aruba">Aruba (297)</option>
                                            <option value="207" data-selectedzoneid="207" data-selectedzonename="Australia/Brisbane">Australia (61)</option>
                                            <option value="179" data-selectedzoneid="179" data-selectedzonename="Europe/Vienna">Austria (43)</option>
                                            <option value="208" data-selectedzoneid="208" data-selectedzonename="Asia/Baku">Azerbaijan (994)</option>
                                            <option value="107" data-selectedzoneid="107" data-selectedzonename="America/Nassau">Bahamas (1)</option>
                                            <option value="116" data-selectedzoneid="116" data-selectedzonename="Asia/Dhaka">Bangladesh (88)</option>
                                            <option value="99" data-selectedzoneid="99" data-selectedzonename="America/Barbados">Barbados (167)</option>
                                            <option value="209" data-selectedzoneid="209" data-selectedzonename="Europe/Minsk">Belarus (375)</option>
                                            <option value="210" data-selectedzoneid="210" data-selectedzonename="Europe/Brussels">Belgium (32)</option>
                                            <option value="211" data-selectedzoneid="211" data-selectedzonename="America/Belize">Belize (501)</option>
                                            <option value="123" data-selectedzoneid="123" data-selectedzonename="Africa/Porto-Novo">Benin (229)</option>
                                            <option value="100" data-selectedzoneid="100" data-selectedzonename="Atlantic/Bermuda">Bermuda (1)</option>
                                            <option value="137" data-selectedzoneid="137" data-selectedzonename="Asia/Thimphu">Bhutan (975)</option>
                                            <option value="163" data-selectedzoneid="163" data-selectedzonename="America/La_Paz">Bolivia (47)</option>
                                            <option value="212" data-selectedzoneid="212" data-selectedzonename="America/La_Paz">Bolivia, Plurinational State of (591)</option>
                                            <option value="213" data-selectedzoneid="213" data-selectedzonename="America/Kralendijk">Bonaire, Sint Eustatius and Saba (599)</option>
                                            <option value="27" data-selectedzoneid="27" data-selectedzonename="Europe/Sarajevo">Bosnia and Herzegovina (387)</option>
                                            <option value="214" data-selectedzoneid="214" data-selectedzonename="Africa/Gaborone">Botswana (267)</option>
                                            <option value="215" data-selectedzoneid="215" data-selectedzonename="Africa/Sao_Tome">Bouvet Island (0)</option>
                                            <option value="18" data-selectedzoneid="18" data-selectedzonename="Europe/Oslo">Bouvet Island (Bouvetoya) (47)</option>
                                            <option value="81" data-selectedzoneid="81" data-selectedzonename="America/Noronha">Brazil (55)</option>
                                            <option value="1" data-selectedzoneid="1" data-selectedzonename="Indian/Chagos">British Indian Ocean Territory (246)</option>
                                            <option value="184" data-selectedzoneid="184" data-selectedzonename="America/Antigua">British Virgin Islands (185)</option>
                                            <option value="189" data-selectedzoneid="189" data-selectedzonename="Asia/Brunei">Brunei Darussalam (673)</option>
                                            <option value="126" data-selectedzoneid="126" data-selectedzonename="Europe/Sofia">Bulgaria (359)</option>
                                            <option value="196" data-selectedzoneid="196" data-selectedzonename="Africa/Ouagadougou">Burkina Faso (226)</option>
                                            <option value="199" data-selectedzoneid="199" data-selectedzonename="Africa/Bujumbura">Burundi (257)</option>
                                            <option value="197" data-selectedzoneid="197" data-selectedzonename="Asia/Phnom_Penh">Cambodia (855)</option>
                                            <option value="98" data-selectedzoneid="98" data-selectedzonename="Africa/Douala">Cameroon (347)</option>
                                            <option value="67" data-selectedzoneid="67" data-selectedzonename="America/Cambridge_Bay">Canada (1)</option>
                                            <option value="43" data-selectedzoneid="43" data-selectedzonename="Atlantic/Cape_Verde">Cape Verde (238)</option>
                                            <option value="79" data-selectedzoneid="79" data-selectedzonename="America/Cayman">Cayman Islands (1)</option>
                                            <option value="216" data-selectedzoneid="216" data-selectedzonename="Africa/Bangui">Central African Republic (236)</option>
                                            <option value="217" data-selectedzoneid="217" data-selectedzonename="Africa/Ndjamena">Chad (235)</option>
                                            <option value="77" data-selectedzoneid="77" data-selectedzonename="America/Punta_Arenas">Chile (56)</option>
                                            <option value="101" data-selectedzoneid="101" data-selectedzonename="Asia/Shanghai">China (86)</option>
                                            <option value="164" data-selectedzoneid="164" data-selectedzonename="Indian/Christmas">Christmas Island (61)</option>
                                            <option value="93" data-selectedzoneid="93" data-selectedzonename="Indian/Cocos">Cocos (Keeling) Islands (61)</option>
                                            <option value="28" data-selectedzoneid="28" data-selectedzonename="America/Bogota">Colombia (57)</option>
                                            <option value="90" data-selectedzoneid="90" data-selectedzonename="Indian/Comoro">Comoros (269)</option>
                                            <option value="85" data-selectedzoneid="85" data-selectedzonename="Africa/Brazzaville">Congo (242)</option>
                                            <option value="218" data-selectedzoneid="218" data-selectedzonename="Africa/Kinshasa">Congo, The Democratic Republic of the (243)</option>
                                            <option value="111" data-selectedzoneid="111" data-selectedzonename="Pacific/Rarotonga">Cook Islands (682)</option>
                                            <option value="105" data-selectedzoneid="105" data-selectedzonename="America/Costa_Rica">Costa Rica (506)</option>
                                            <option value="106" data-selectedzoneid="106" data-selectedzonename="Africa/Abidjan">Cote d'Ivoire (225)</option>
                                            <option value="135" data-selectedzoneid="135" data-selectedzonename="Europe/Zagreb">Croatia (385)</option>
                                            <option value="16" data-selectedzoneid="16" data-selectedzonename="America/Havana">Cuba (131)</option>
                                            <option value="219" data-selectedzoneid="219" data-selectedzonename="America/Curacao">Curaçao (599)</option>
                                            <option value="220" data-selectedzoneid="220" data-selectedzonename="Asia/Famagusta">Cyprus (357)</option>
                                            <option value="88" data-selectedzoneid="88" data-selectedzonename="Europe/Prague">Czech Republic (420)</option>
                                            <option value="54" data-selectedzoneid="54" data-selectedzonename="Europe/Copenhagen">Denmark (45)</option>
                                            <option value="13" data-selectedzoneid="13" data-selectedzonename="Africa/Djibouti">Djibouti (253)</option>
                                            <option value="143" data-selectedzoneid="143" data-selectedzonename="America/Dominica">Dominica (1)</option>
                                            <option value="7" data-selectedzoneid="7" data-selectedzonename="America/Santo_Domingo">Dominican Republic (1)</option>
                                            <option value="155" data-selectedzoneid="155" data-selectedzonename="America/Guayaquil">Ecuador (393)</option>
                                            <option value="221" data-selectedzoneid="221" data-selectedzonename="Africa/Cairo">Egypt (20)</option>
                                            <option value="24" data-selectedzoneid="24" data-selectedzonename="America/El_Salvador">El Salvador (503)</option>
                                            <option value="175" data-selectedzoneid="175" data-selectedzonename="Africa/Malabo">Equatorial Guinea (240)</option>
                                            <option value="47" data-selectedzoneid="47" data-selectedzonename="Africa/Asmara">Eritrea (291)</option>
                                            <option value="222" data-selectedzoneid="222" data-selectedzonename="Europe/Tallinn">Estonia (372)</option>
                                            <option value="223" data-selectedzoneid="223" data-selectedzonename="Africa/Addis_Ababa">Ethiopia (251)</option>
                                            <option value="198" data-selectedzoneid="198" data-selectedzonename="Atlantic/Stanley">Falkland Islands (Malvinas) (500)</option>
                                            <option value="142" data-selectedzoneid="142" data-selectedzonename="Atlantic/Faroe">Faroe Islands (298)</option>
                                            <option value="224" data-selectedzoneid="224" data-selectedzonename="Pacific/Fiji">Fiji (679)</option>
                                            <option value="109" data-selectedzoneid="109" data-selectedzonename="Europe/Helsinki">Finland (358)</option>
                                            <option value="160" data-selectedzoneid="160" data-selectedzonename="Europe/Paris">France (33)</option>
                                            <option value="166" data-selectedzoneid="166" data-selectedzonename="America/Cayenne">French Guiana (594)</option>
                                            <option value="225" data-selectedzoneid="225" data-selectedzonename="Pacific/Tahiti">French Polynesia (689)</option>
                                            <option value="36" data-selectedzoneid="36" data-selectedzonename="Indian/Kerguelen">French Southern Territories (0)</option>
                                            <option value="108" data-selectedzoneid="108" data-selectedzonename="Africa/Libreville">Gabon (161)</option>
                                            <option value="84" data-selectedzoneid="84" data-selectedzonename="Africa/Banjul">Gambia (220)</option>
                                            <option value="2" data-selectedzoneid="2" data-selectedzonename="Asia/Tbilisi">Georgia (995)</option>
                                            <option value="32" data-selectedzoneid="32" data-selectedzonename="Europe/Berlin">Germany (49)</option>
                                            <option value="112" data-selectedzoneid="112" data-selectedzonename="Africa/Accra">Ghana (233)</option>
                                            <option value="162" data-selectedzoneid="162" data-selectedzonename="Europe/Gibraltar">Gibraltar (350)</option>
                                            <option value="82" data-selectedzoneid="82" data-selectedzonename="Europe/Athens">Greece (30)</option>
                                            <option value="57" data-selectedzoneid="57" data-selectedzonename="America/Thule">Greenland (299)</option>
                                            <option value="226" data-selectedzoneid="226" data-selectedzonename="Pacific/Gambier">Grenada (1)</option>
                                            <option value="191" data-selectedzoneid="191" data-selectedzonename="America/Guadeloupe">Guadeloupe (590)</option>
                                            <option value="161" data-selectedzoneid="161" data-selectedzonename="Pacific/Guam">Guam (1)</option>
                                            <option value="46" data-selectedzoneid="46" data-selectedzonename="America/Guatemala">Guatemala (502)</option>
                                            <option value="80" data-selectedzoneid="80" data-selectedzonename="Europe/Guernsey">Guernsey (44)</option>
                                            <option value="33" data-selectedzoneid="33" data-selectedzonename="Africa/Conakry">Guinea (224)</option>
                                            <option value="156" data-selectedzoneid="156" data-selectedzonename="Africa/Bissau">Guinea-Bissau (245)</option>
                                            <option value="168" data-selectedzoneid="168" data-selectedzonename="America/Guyana">Guyana (592)</option>
                                            <option value="150" data-selectedzoneid="150" data-selectedzonename="America/Port-au-Prince">Haiti (509)</option>
                                            <option value="146" data-selectedzoneid="146" data-selectedzonename="Asia/Aqtau">Heard Island and McDonald Islands (0)</option>
                                            <option value="124" data-selectedzoneid="124" data-selectedzonename="Europe/Vatican">Holy See (Vatican City State) (39)</option>
                                            <option value="4" data-selectedzoneid="4" data-selectedzonename="America/Tegucigalpa">Honduras (504)</option>
                                            <option value="147" data-selectedzoneid="147" data-selectedzonename="Asia/Hong_Kong">Hong Kong (852)</option>
                                            <option value="152" data-selectedzoneid="152" data-selectedzonename="Europe/Budapest">Hungary (36)</option>
                                            <option value="68" data-selectedzoneid="68" data-selectedzonename="Atlantic/Reykjavik">Iceland (354)</option>
                                            <option value="5" data-selectedzoneid="5" data-selectedzonename="Asia/Kolkata">India (91)</option>
                                            <option value="10" data-selectedzoneid="10" data-selectedzonename="Asia/Makassar">Indonesia (62)</option>
                                            <option value="86" data-selectedzoneid="86" data-selectedzonename="Asia/Tehran">Iran (11)</option>
                                            <option value="227" data-selectedzoneid="227" data-selectedzonename="Asia/Tehran">Iran, Islamic Republic of (98)</option>
                                            <option value="51" data-selectedzoneid="51" data-selectedzonename="Asia/Baghdad">Iraq (964)</option>
                                            <option value="228" data-selectedzoneid="228" data-selectedzonename="Europe/Dublin">Ireland (353)</option>
                                            <option value="44" data-selectedzoneid="44" data-selectedzonename="Europe/Isle_of_Man">Isle of Man (44)</option>
                                            <option value="12" data-selectedzoneid="12" data-selectedzonename="Asia/Jerusalem">Israel (972)</option>
                                            <option value="195" data-selectedzoneid="195" data-selectedzonename="Europe/Rome">Italy (39)</option>
                                            <option value="83" data-selectedzoneid="83" data-selectedzonename="America/Jamaica">Jamaica (1)</option>
                                            <option value="180" data-selectedzoneid="180" data-selectedzonename="Asia/Tokyo">Japan (81)</option>
                                            <option value="136" data-selectedzoneid="136" data-selectedzonename="Europe/Jersey">Jersey (44)</option>
                                            <option value="157" data-selectedzoneid="157" data-selectedzonename="Asia/Amman">Jordan (962)</option>
                                            <option value="187" data-selectedzoneid="187" data-selectedzonename="Asia/Aqtau">Kazakhstan (7)</option>
                                            <option value="167" data-selectedzoneid="167" data-selectedzonename="Africa/Nairobi">Kenya (254)</option>
                                            <option value="229" data-selectedzoneid="229" data-selectedzonename="Pacific/Enderbury">Kiribati (686)</option>
                                            <option value="94" data-selectedzoneid="94" data-selectedzonename="Asia/Seoul">Korea (9)</option>
                                            <option value="230" data-selectedzoneid="230" data-selectedzonename="Asia/Pyongyang">Korea, Democratic People's Republic of (850)</option>
                                            <option value="231" data-selectedzoneid="231" data-selectedzonename="Asia/Seoul">Korea, Republic of (82)</option>
                                            <option value="138" data-selectedzoneid="138" data-selectedzonename="Asia/Kuwait">Kuwait (965)</option>
                                            <option value="173" data-selectedzoneid="173" data-selectedzonename="Asia/Almaty">Kyrgyz Republic (56)</option>
                                            <option value="232" data-selectedzoneid="232" data-selectedzonename="Asia/Bishkek">Kyrgyzstan (996)</option>
                                            <option value="233" data-selectedzoneid="233" data-selectedzonename="Asia/Vientiane">Lao People's Democratic Republic (856)</option>
                                            <option value="115" data-selectedzoneid="115" data-selectedzonename="Europe/Riga">Latvia (371)</option>
                                            <option value="58" data-selectedzoneid="58" data-selectedzonename="Asia/Beirut">Lebanon (961)</option>
                                            <option value="39" data-selectedzoneid="39" data-selectedzonename="Africa/Maseru">Lesotho (266)</option>
                                            <option value="66" data-selectedzoneid="66" data-selectedzonename="Africa/Monrovia">Liberia (231)</option>
                                            <option value="234" data-selectedzoneid="234" data-selectedzonename="Africa/Tripoli">Libya (218)</option>
                                            <option value="125" data-selectedzoneid="125" data-selectedzonename="Europe/Warsaw">Libyan Arab Jamahiriya (218)</option>
                                            <option value="34" data-selectedzoneid="34" data-selectedzonename="Europe/Vaduz">Liechtenstein (370)</option>
                                            <option value="127" data-selectedzoneid="127" data-selectedzonename="Europe/Vilnius">Lithuania (99)</option>
                                            <option value="132" data-selectedzoneid="132" data-selectedzonename="Europe/Luxembourg">Luxembourg (352)</option>
                                            <option value="69" data-selectedzoneid="69" data-selectedzonename="Asia/Macau">Macao (853)</option>
                                            <option value="113" data-selectedzoneid="113" data-selectedzonename="Europe/Skopje">Macedonia (14)</option>
                                            <option value="235" data-selectedzoneid="235" data-selectedzonename="Europe/Skopje">Macedonia, Republic of Yugoslavia (389)</option>
                                            <option value="165" data-selectedzoneid="165" data-selectedzonename="Indian/Antananarivo">Madagascar (261)</option>
                                            <option value="236" data-selectedzoneid="236" data-selectedzonename="Africa/Blantyre">Malawi (265)</option>
                                            <option value="37" data-selectedzoneid="37" data-selectedzonename="Asia/Kuala_Lumpur">Malaysia (60)</option>
                                            <option value="55" data-selectedzoneid="55" data-selectedzonename="Indian/Maldives">Maldives (960)</option>
                                            <option value="128" data-selectedzoneid="128" data-selectedzonename="Africa/Bamako">Mali (223)</option>
                                            <option value="48" data-selectedzoneid="48" data-selectedzonename="Europe/Malta">Malta (356)</option>
                                            <option value="237" data-selectedzoneid="237" data-selectedzonename="Pacific/Kwajalein">Marshall Islands (692)</option>
                                            <option value="185" data-selectedzoneid="185" data-selectedzonename="America/Martinique">Martinique (596)</option>
                                            <option value="181" data-selectedzoneid="181" data-selectedzonename="Africa/Nouakchott">Mauritania (222)</option>
                                            <option value="3" data-selectedzoneid="3" data-selectedzonename="Indian/Mauritius">Mauritius (230)</option>
                                            <option value="87" data-selectedzoneid="87" data-selectedzonename="	Indian/Mayotte">Mayotte (262)</option>
                                            <option value="38" data-selectedzoneid="38" data-selectedzonename="America/Chihuahua">Mexico (52)</option>
                                            <option value="238" data-selectedzoneid="238" data-selectedzonename="Pacific/Kosrae">Micronesia, Federated States of (691)</option>
                                            <option value="182" data-selectedzoneid="182" data-selectedzonename="Europe/Chisinau">Moldova (74)</option>
                                            <option value="239" data-selectedzoneid="239" data-selectedzonename="Europe/Chisinau">Moldova, Republic of (373)</option>
                                            <option value="11" data-selectedzoneid="11" data-selectedzonename="Europe/Monaco">Monaco (976)</option>
                                            <option value="240" data-selectedzoneid="240" data-selectedzonename="Asia/Choibalsan">Mongolia (976)</option>
                                            <option value="59" data-selectedzoneid="59" data-selectedzonename="Europe/Podgorica">Montenegro (382)</option>
                                            <option value="241" data-selectedzoneid="241" data-selectedzonename="America/Montserrat	">Montserrat (382)</option>
                                            <option value="35" data-selectedzoneid="35" data-selectedzonename="Africa/Casablanca">Morocco (212)</option>
                                            <option value="41" data-selectedzoneid="41" data-selectedzonename="Africa/Maputo">Mozambique (258)</option>
                                            <option value="190" data-selectedzoneid="190" data-selectedzonename="Asia/Yangon">Myanmar (95)</option>
                                            <option value="192" data-selectedzoneid="192" data-selectedzonename="Africa/Windhoek">Namibia (264)</option>
                                            <option value="242" data-selectedzoneid="242" data-selectedzonename="Pacific/Nauru">Nauru (674)</option>
                                            <option value="243" data-selectedzoneid="243" data-selectedzonename="Asia/Kathmandu">Nepal (977)</option>
                                            <option value="174" data-selectedzoneid="174" data-selectedzonename="Europe/Amsterdam">Netherlands (31)</option>
                                            <option value="153" data-selectedzoneid="153" data-selectedzonename="America/Rio_Branco">Netherlands Antilles (51)</option>
                                            <option value="21" data-selectedzoneid="21" data-selectedzonename="Pacific/Noumea">New Caledonia (64)</option>
                                            <option value="23" data-selectedzoneid="23" data-selectedzonename="Pacific/Auckland">New Zealand (505)</option>
                                            <option value="49" data-selectedzoneid="49" data-selectedzonename="America/Managua">Nicaragua (86)</option>
                                            <option value="8" data-selectedzoneid="8" data-selectedzonename="Africa/Niamey">Niger (227)</option>
                                            <option value="144" data-selectedzoneid="144" data-selectedzonename="Africa/Lagos">Nigeria (234)</option>
                                            <option value="19" data-selectedzoneid="19" data-selectedzonename="Pacific/Niue">Niue (683)</option>
                                            <option value="140" data-selectedzoneid="140" data-selectedzonename="Pacific/Norfolk">Norfolk Island (672)</option>
                                            <option value="22" data-selectedzoneid="22" data-selectedzonename="Pacific/Saipan">Northern Mariana Islands (1)</option>
                                            <option value="244" data-selectedzoneid="244" data-selectedzonename="Europe/Oslo">Norway (47)</option>
                                            <option value="178" data-selectedzoneid="178" data-selectedzonename="Asia/Muscat">Oman (968)</option>
                                            <option value="9" data-selectedzoneid="9" data-selectedzonename="Asia/Karachi">Pakistan (92)</option>
                                            <option value="50" data-selectedzoneid="50" data-selectedzonename="Pacific/Palau">Palau (680)</option>
                                            <option value="245" data-selectedzoneid="245" data-selectedzonename="Asia/Gaza">Palestine, State of (970)</option>
                                            <option value="119" data-selectedzoneid="119" data-selectedzonename="Asia/Baghdad">Palestinian Territories (3)</option>
                                            <option value="159" data-selectedzoneid="159" data-selectedzonename="America/Panama">Panama (507)</option>
                                            <option value="95" data-selectedzoneid="95" data-selectedzonename="Pacific/Port_Moresby">Papua New Guinea (675)</option>
                                            <option value="63" data-selectedzoneid="63" data-selectedzonename="America/Asuncion">Paraguay (51)</option>
                                            <option value="188" data-selectedzoneid="188" data-selectedzonename="America/Lima">Peru (157)</option>
                                            <option value="148" data-selectedzoneid="148" data-selectedzonename="Asia/Manila">Philippines (63)</option>
                                            <option value="131" data-selectedzoneid="131" data-selectedzonename="Pacific/Pitcairn">Pitcairn Islands (64)</option>
                                            <option value="29" data-selectedzoneid="29" data-selectedzonename="Europe/Warsaw">Poland (48)</option>
                                            <option value="102" data-selectedzoneid="102" data-selectedzonename="Atlantic/Azores">Portugal (351)</option>
                                            <option value="89" data-selectedzoneid="89" data-selectedzonename="America/Puerto_Rico">Puerto Rico (1)</option>
                                            <option value="96" data-selectedzoneid="96" data-selectedzonename="Asia/Qatar">Qatar (974)</option>
                                            <option value="42" data-selectedzoneid="42" data-selectedzonename="Indian/Reunion">Reunion (262)</option>
                                            <option value="145" data-selectedzoneid="145" data-selectedzonename="Europe/Bucharest">Romania (40)</option>
                                            <option value="56" data-selectedzoneid="56" data-selectedzonename="Asia/Krasnoyarsk">Russian Federation (7)</option>
                                            <option value="72" data-selectedzoneid="72" data-selectedzonename="Africa/Kigali">Rwanda (250)</option>
                                            <option value="158" data-selectedzoneid="158" data-selectedzonename="America/St_Barthelemy">Saint Barthelemy (590)</option>
                                            <option value="97" data-selectedzoneid="97" data-selectedzonename="Atlantic/St_Helena">Saint Helena (22)</option>
                                            <option value="246" data-selectedzoneid="246" data-selectedzonename="Atlantic/St_Helena">Saint Helena, Ascension and Tristan da Cunha (290)</option>
                                            <option value="194" data-selectedzoneid="194" data-selectedzonename="America/St_Kitts">Saint Kitts and Nevis (1)</option>
                                            <option value="247" data-selectedzoneid="247" data-selectedzonename="America/St_Lucia">Saint Lucia (1)</option>
                                            <option value="134" data-selectedzoneid="134" data-selectedzonename="America/Marigot">Saint Martin (147)</option>
                                            <option value="248" data-selectedzoneid="248" data-selectedzonename="America/Marigot">Saint Martin (French part) (590)</option>
                                            <option value="122" data-selectedzoneid="122" data-selectedzonename="America/Miquelon">Saint Pierre and Miquelon (508)</option>
                                            <option value="114" data-selectedzoneid="114" data-selectedzonename="America/St_Vincent">Saint Vincent and the Grenadines (1)</option>
                                            <option value="118" data-selectedzoneid="118" data-selectedzonename="Pacific/Apia">Samoa (685)</option>
                                            <option value="53" data-selectedzoneid="53" data-selectedzonename="Europe/San_Marino">San Marino (378)</option>
                                            <option value="249" data-selectedzoneid="249" data-selectedzonename="Africa/Sao_Tome">Sao Tome and Principe (239)</option>
                                            <option value="117" data-selectedzoneid="117" data-selectedzonename="Asia/Riyadh">Saudi Arabia (966)</option>
                                            <option value="70" data-selectedzoneid="70" data-selectedzonename="Africa/Dakar">Senegal (221)</option>
                                            <option value="20" data-selectedzoneid="20" data-selectedzonename="Europe/Belgrade">Serbia (381)</option>
                                            <option value="52" data-selectedzoneid="52" data-selectedzonename="Indian/Mahe">Seychelles (248)</option>
                                            <option value="62" data-selectedzoneid="62" data-selectedzonename="Africa/Freetown">Sierra Leone (232)</option>
                                            <option value="170" data-selectedzoneid="170" data-selectedzonename="Asia/Singapore">Singapore (65)</option>
                                            <option value="250" data-selectedzoneid="250" data-selectedzonename="America/Lower_Princes">Sint Maarten (Dutch part) (1)</option>
                                            <option value="251" data-selectedzoneid="251" data-selectedzonename="Europe/Bratislava">Slovakia (421)</option>
                                            <option value="45" data-selectedzoneid="45" data-selectedzonename="Europe/Ljubljana">Slovenia (90)</option>
                                            <option value="200" data-selectedzoneid="200" data-selectedzonename="Pacific/Guadalcanal">Solomon Islands (677)</option>
                                            <option value="141" data-selectedzoneid="141" data-selectedzonename="Africa/Mogadishu">Somalia (252)</option>
                                            <option value="129" data-selectedzoneid="129" data-selectedzonename="Africa/Johannesburg">South Africa (27)</option>
                                            <option value="30" data-selectedzoneid="30" data-selectedzonename="Atlantic/South_Georgia">South Georgia and the South Sandwich Islands (500)</option>
                                            <option value="253" data-selectedzoneid="253" data-selectedzonename="Africa/Juba">South Sudan (211)</option>
                                            <option value="149" data-selectedzoneid="149" data-selectedzonename="Atlantic/Canary">Spain (34)</option>
                                            <option value="17" data-selectedzoneid="17" data-selectedzonename="Asia/Colombo">Sri Lanka (94)</option>
                                            <option value="252" data-selectedzoneid="252" data-selectedzonename="Africa/Khartoum">Sudan (249)</option>
                                            <option value="31" data-selectedzoneid="31" data-selectedzonename="America/Paramaribo">Suriname (67)</option>
                                            <option value="25" data-selectedzoneid="25" data-selectedzonename="Europe/Berlin">Svalbard &amp; Jan Mayen Islands (122)</option>
                                            <option value="254" data-selectedzoneid="254" data-selectedzonename="Arctic/Longyearbyen">Svalbard and Jan Mayen (47)</option>
                                            <option value="169" data-selectedzoneid="169" data-selectedzonename="Africa/Mbabane">Swaziland (268)</option>
                                            <option value="176" data-selectedzoneid="176" data-selectedzonename="Europe/Stockholm">Sweden (46)</option>
                                            <option value="255" data-selectedzoneid="255" data-selectedzonename="Europe/Zurich">Switzerland (41)</option>
                                            <option value="92" data-selectedzoneid="92" data-selectedzonename="Asia/Damascus">Syrian Arab Republic (963)</option>
                                            <option value="78" data-selectedzoneid="78" data-selectedzonename="Asia/Taipei">Taiwan (886)</option>
                                            <option value="139" data-selectedzoneid="139" data-selectedzonename="Asia/Dushanbe">Tajikistan (992)</option>
                                            <option value="183" data-selectedzoneid="183" data-selectedzonename="Africa/Dar_es_Salaam">Tanzania (59)</option>
                                            <option value="256" data-selectedzoneid="256" data-selectedzonename="Africa/Dar_es_Salaam">Tanzania, United Republic of (255)</option>
                                            <option value="120" data-selectedzoneid="120" data-selectedzonename="Asia/Bangkok">Thailand (66)</option>
                                            <option value="110" data-selectedzoneid="110" data-selectedzonename="Asia/Dili">Timor-Leste (670)</option>
                                            <option value="74" data-selectedzoneid="74" data-selectedzonename="Africa/Lome">Togo (228)</option>
                                            <option value="257" data-selectedzoneid="257" data-selectedzonename="Pacific/Fakaofo">Tokelau (690)</option>
                                            <option value="76" data-selectedzoneid="76" data-selectedzonename="Pacific/Tongatapu">Tonga (676)</option>
                                            <option value="177" data-selectedzoneid="177" data-selectedzonename="America/Port_of_Spain">Trinidad and Tobago (1)</option>
                                            <option value="73" data-selectedzoneid="73" data-selectedzonename="Africa/Tunis">Tunisia (216)</option>
                                            <option value="258" data-selectedzoneid="258" data-selectedzonename="Europe/Istanbul">Turkey (90)</option>
                                            <option value="259" data-selectedzoneid="259" data-selectedzonename="Asia/Ashgabat">Turkmenistan (993)</option>
                                            <option value="260" data-selectedzoneid="260" data-selectedzonename="America/Grand_Turk">Turks and Caicos Islands (1)</option>
                                            <option value="261" data-selectedzoneid="261" data-selectedzonename="Pacific/Funafuti">Tuvalu (688)</option>
                                            <option value="61" data-selectedzoneid="61" data-selectedzonename="Africa/Kampala">Uganda (256)</option>
                                            <option value="121" data-selectedzoneid="121" data-selectedzonename="Europe/Kiev">Ukraine (380)</option>
                                            <option value="133" data-selectedzoneid="133" data-selectedzonename="Asia/Dubai">United Arab Emirates (971)</option>
                                            <option value="103" data-selectedzoneid="103" data-selectedzonename="Europe/London">United Kingdom (44)</option>
                                            <option value="75" data-selectedzoneid="75" data-selectedzonename="Pacific/Midway">United States Minor Outlying Islands (130)</option>
                                            <option value="154" data-selectedzoneid="154" data-selectedzonename="America/New_York">United States of America (1)</option>
                                            <option value="171" data-selectedzoneid="171" data-selectedzonename="America/Anguilla">United States Virgin Islands (10)</option>
                                            <option value="104" data-selectedzoneid="104" data-selectedzonename="America/Montevideo">Uruguay (598)</option>
                                            <option value="26" data-selectedzoneid="26" data-selectedzonename="Asia/Samarkand">Uzbekistan (998)</option>
                                            <option value="151" data-selectedzoneid="151" data-selectedzonename="Pacific/Efate">Vanuatu (678)</option>
                                            <option value="6" data-selectedzoneid="6" data-selectedzonename="America/Caracas">Venezuela (185)</option>
                                            <option value="262" data-selectedzoneid="262" data-selectedzonename="America/Caracas">Venezuela, Bolivarian Republic of (58)</option>
                                            <option value="263" data-selectedzoneid="263" data-selectedzonename="Asia/Ho_Chi_Minh">Viet Nam (84)</option>
                                            <option value="60" data-selectedzoneid="60" data-selectedzonename="Asia/Ho_Chi_Minh">Vietnam (90)</option>
                                            <option value="264" data-selectedzoneid="264" data-selectedzonename="America/Tortola">Virgin Islands, British (1)</option>
                                            <option value="265" data-selectedzoneid="265" data-selectedzonename="America/St_Thomas">Virgin Islands, U.S. (1)</option>
                                            <option value="71" data-selectedzoneid="71" data-selectedzonename="Pacific/Wallis">Wallis and Futuna (681)</option>
                                            <option value="65" data-selectedzoneid="65" data-selectedzonename="Africa/El_Aaiun">Western Sahara (212)</option>
                                            <option value="130" data-selectedzoneid="130" data-selectedzonename="Asia/Aden">Yemen (967)</option>
                                            <option value="64" data-selectedzoneid="64" data-selectedzonename="Africa/Lusaka">Zambia (260)</option>
                                            <option value="266" data-selectedzoneid="266" data-selectedzonename="Africa/Harare">Zimbabwe (263)</option>
                                        </select>
                            
                                    <input type="text" id="c_phone" name="c_phone" placeholder="Phone" required>
                                </div>
                                <div class="form-row">
                                    <input type="text" id="c_subject" name="c_subject" placeholder="Subject" required>
                                </div>
                                <div class="form-row">
                                    <textarea name="c_message" id="c_message" placeholder="Message" required></textarea>
                                </div>
                                <div class="form-row">
                                    <input id="wd-button" name="wd-button" type="submit" value="Submit">
                                </div>
                            </form>`;
                            
                            $(sectionnode).find('#contactform').append(html);

                            /*
                            * if once form loaded
                            */  
                            formloaded = formloaded + 1;
                            if($(sectionnode).find('#contactform').html() !="" &&  formloaded == 1) {

                                 $("#contactform-submit-custom").submit(function(e) {
                                      e.preventDefault(); // avoid to execute the actual submit of the form.
                                  
                                      var form = $(this);
                                      var url = "{{config('app.api_url')}}/api/contact/enquiry/"+MIYNBuilder.apidata.uid;
                                      var formdata = form.serialize();

                                      //$('#changeSubmit').text('Sending..');
                                      $("#changeSubmit").attr("disabled", true);
                                      
                                      var timezonename = $('#contactform-submit-custom  #client_country_id option:selected').attr('data-selectedzonename');
                                      formdata = formdata + '&timezonename=' + timezonename + '&b_id='+ MIYNBuilder.apidata.id + '&business_uid=' + MIYNBuilder.apidata.uid;
                                      //console.log(timezonename);
                                      
                                      $.ajax({
                                         type: "POST",
                                         url: url,
                                         data: formdata, // serializes the form's elements.
                                         success: function(data)
                                         {
                                             $(".result-msg").text('<span>Thank you, we will rsponse soon.</span>');
                                             console.log(data); // show response from the php script.
                                             $("#wd-button").attr("disabled", false);
                                             $("#contactform-submit-custom").trigger("reset");

                                         }
                                      });
                                  });

                            }

                            /*
                            * if once form loaded end
                            */ 

                            
                            console.log(MIYNBuilder.apidata);
                            
                             $(sectionnode).find('#contactinfo').html("");
                             
                                var social = "";
                                if(MIYNBuilder.apidata.facebook !="") {
                                    social +='<a href="'+MIYNBuilder.apidata.facebook+'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
                                }
                                if(MIYNBuilder.apidata.twitter !="") {
                                    social +='<a href="'+MIYNBuilder.apidata.twitter+'" target="_blank"><i class="fab fa-twitter"></i></a>';
                                }
                                if(MIYNBuilder.apidata.linkdin !="") {
                                    social +='<a href="'+MIYNBuilder.apidata.linkdin+'" target="_blank"><i class="fab fa-instagram"></i></a>';
                                }

                            var html = `<div class="law-contact-list">
                                <div class="law-contact-list-single">
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <a href="tel:`+MIYNBuilder.apidata.b_phone+`">`+MIYNBuilder.apidata.b_phone+`</a>
                                </div>
                                <div class="law-contact-list-single">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <a href="#">`+MIYNBuilder.apidata.b_address+`</a>
                                </div>
                                <div class="law-contact-list-single">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <a href="mailto:`+MIYNBuilder.apidata.b_email+`">`+MIYNBuilder.apidata.b_email+`</a>
                                </div>
                                <div class="law-contact-list-single">
                                    <div class="icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <a href="`+MIYNBuilder.apidata.b_website+`">`+MIYNBuilder.apidata.b_website+`</a>
                                </div>
                            </div>
        
                            <div class="law-contact-social">
                                <h5>Find us on-</h5>
                                <div class="law-contact-social-button">`+social+`</div>
                            </div>`;
                            
                            $(sectionnode).find('#contactinfo').append(html);

                    
		        }
		        
		        if(dataname === "widgetbutton") {
		            //console.log(sections[i].node);
                    $(sectionnode).find('#widgetbuttons-area').html("");
                    for(var i = 0; i < MIYNBuilder.apidata.liveaction.length; i++) {
                        //console.log(MIYNBuilder.apidata.liveaction[i]);
                            var html = `<a href="#" class="single-fine-us-block miyn`+MIYNBuilder.apidata.liveaction[i].calltoaction+`">
                                    <div class="single-fine-us-block-inner">
                                        <div class="single-fine-us-block-left">
                                            <div class="single-fine-us-block-left-upper">
                                                <div class="icon">`;

                                                   
                                                   html += MIYNBuilder.Builder.SVGIcons(MIYNBuilder.apidata.liveaction[i].calltoaction);

                                                html += `</div>
                                                <h4>`+MIYNBuilder.apidata.liveaction[i].name+`</h4>
                                            </div>
                                            <div class="single-fine-us-block-left-bottom">
                                                `+MIYNBuilder.apidata.liveaction[i].name+`
                                            </div>
                                        </div>
                                        <div class="single-fine-us-block-right">
                                            <img class="" src="{{config('app.live_url')}}/themes/lawyer/img/arrow-left.png" alt="Icon">
                                        </div>
                                    </div>
                                </a>`;
                            $(sectionnode).find('#widgetbuttons-area').append(html)
                    }
		        }
		        
		        
		            $("#contactform-submit").submit(function(e) {
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                    
                        var form = $(this);
                        var url = "{{config('app.api_url')}}/api/contact-enquiry";
                        var formdata = form.serialize();

                        //$('#changeSubmit').text('Sending..');
                        $("#changeSubmit").attr("disabled", true);
                        
                        var timezonename = $('#contactform-submit  #client_country_id option:selected').attr('data-selectedzonename');
                        formdata = formdata + '&timezonename=' + timezonename + '&b_id='+ MIYNBuilder.apidata.id + '&business_uid=' + MIYNBuilder.apidata.uid;
                        //console.log(timezonename);
                        
                        $.ajax({
                           type: "POST",
                           url: url,
                           data: formdata, // serializes the form's elements.
                           success: function(data)
                           {
                               $(".result-msg").text('<span>Thank you, we will rsponse soon.</span>');
                               console.log(data); // show response from the php script.
                               $("#wd-button").attr("disabled", false);
                               $("#contactform-submit").trigger("reset");

                           }
                        });
                    });
		        
		        
		        
		        
		    }

		}

	}

}

$( document ).ready(function() {
    MIYNBuilder.Builder.init(function(e) {});
});


</script>
    
 
</html>