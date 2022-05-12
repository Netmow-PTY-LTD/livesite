

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;
$days = \DB::table('days')->select('id', 'name', 'full_name')->get();
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $allbusinessinfo->business_name; ?> </title>
    <!-- <link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet"> -->
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
         .container {
             padding-top: 5px;
             padding-bottom: 5px;
         }
        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
          width: 100%;
          padding-right: var(--bs-gutter-x, 0.75rem);
          padding-left: var(--bs-gutter-x, 0.75rem);
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


        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
          padding-top:5px;
          padding-bottom:5px;
        }

        .row {
          padding-top:5px;
          padding-bottom:5px;
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
        padding-left: 1rem;
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
        /*    border: 1px solid #fb8f8f!important;*/
        }


        /*
           Edit box
        */

        *{
           margin:0;
           padding:0;
           margin-top:0;
           margin-bottom:0;
        /*   border:1px dashed transparent!important;*/
        }

        .edit-text {
            border:1px solid <?php echo $color_bg; ?>!important;
        }

        </style>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

        <style type="text/css">

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 400;
            color: #2F3A5F;
            /*background: #F1FCFF;*/
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
            border:1px dashed <?php echo $color_bg; ?>!important;
        }


        /* Top Header  */

        /* Navigation */

        .header-area {
            background: #fff;
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
            transform: translateY(-11px) rotate(-45deg);
            -webkit-transform: translateY(-11px) rotate(-45deg);
            -moz-transform: translateY(-11px) rotate(-45deg);
            -ms-transform: translateY(-11px) rotate(-45deg);
            -o-transform: translateY(-11px) rotate(-45deg);
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

        .law-menu-area ul {
        	margin: 0;
        	padding: 0;
        	display: flex;
        	align-items: center;
        	justify-content: flex-end;
        }
        .law-menu-area ul li {
            list-style: none;
        }
        .law-menu-area ul li a {
        	font-size: 20px;
        	font-weight: 500;
        	line-height: 70px;
        	padding: 0 22px;
        }
        .law-menu-area ul li:last-child a {
            padding-right: 0;
        }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<style type="text/css">
    .portal-banner {
      position: relative;
      background-repeat: no-repeat;
      background-size: cover;
      z-index: 1;
      padding-top: 220px;
      background-position: center;
    }
		.portal-banner::after {
		    content: "";
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(253, 253, 253, 0.30);
		    z-index: -1;
		}
		.heading-area {
		    background-color: #ffffff;
		}
		.heading-content {
		    display: flex;
		    /*flex-flow: wrap row;*/
		}
		.logo-area {
		    width: 150px;
		}
        .logo {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            margin-top: -55px;
            border: 5px solid #ffffff;
            border-radius: 100%;
            position: relative;
            top: 5px;
            background-color: #F5F5F5;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
          }
		.logo img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*width: 80px;*/
            height: auto;
        }
		.heading-title {
		    width: calc(100% - 185px);
		    align-self: center;
		    padding-left: 35px;
		}
		.heading-title h2 {
		    font-size: 25px;
		    color: #454545;
		    font-weight: 600;
		}
		.heading-title h3 {
            color: #777;
            line-height: 20px;
            font-size: 15px;
            font-weight: 500;
		}
		.main-content-area {
		    margin-top: 30px;
		    position: relative;
		}

				.main-content-area {
		    margin-top: 30px;
		    position: relative;
		}
		.content-area {
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		}
		.portal-sidebar {
		    width: 30%;
		}
		.sidebar-item {
		    background-color: #FFFFFF;
		    padding: 20px;
		    margin-bottom: 30px;
		}
		.sidebar-item h3 {
		    font-family: 'Poppins', sans-serif;
		    color: #555555;
		    font-size: 16px;
		    font-weight: 600;
		    padding-bottom: 25px;
		    border-bottom: 1px solid #EEEEEE;
		    margin: 0 0 25px;
		    text-transform: uppercase;
		}
		.my-account-block {
            display: flex;
        }
        .my-account-block > div {
            width: 50%;
        }
        .my-account-block .sidebar-item-content {
            width: 60%;
        }
		.sidebar-item.my-account-block p {
		    font-family: 'Poppins', sans-serif;
            text-align: left;
        }
        .my-account-block .my-account-button {
		    font-family: 'Poppins', sans-serif;
            text-align: center;
            align-self: center;
            padding: 0 0 0 10px;
            width: calc(50% - 10px);
        }
		.sidebar-item.my-account-block h3 {
		    font-family: 'Poppins', sans-serif;
		    color: #555555;
		    font-size: 16px;
		    font-weight: 600;
		    padding-bottom: 0;
		    border-bottom: 0;
		    margin: 0;
		    text-transform: uppercase;
		}
		.my-account-button a {
		    font-family: 'Poppins', sans-serif;
            display: block;
            line-height: 40px;
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
        }
        .my-account-button a:hover{
            background-color: #A0A6AB;
            color: #ffffff;
        }
		.sidebar-item-content p {
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    font-size: 14px;
		    color: #6E6E6E;
		    line-height: 1.5;
		    text-align: justify;
		}
		.sidebar-gallery {
		    margin-top: 25px;
		}
		.sidebar-gallery img {
		   width:100%;
		}
		.sidebar-item-content ul {
		    list-style: none;
		    position: relative;
		}
		.sidebar-item-content ul li {
      padding-left: 50px;
      position: relative;
      display: flex;
      align-items: center;
      min-height: 32px;
  }
		.sidebar-item-content ul li:not(:first-child) {
            margin-top: 25px;
        }
        .sidebar-item-content ul li span {
        	background-color: <?php echo $color_bg; ?>;
        	position: absolute;
        	top: 0;
        	left: 0;
        	width: 32px;
        	text-align: center;
        	height: 32px;
        	line-height: 32px;
        	display: flex;
        	align-items: center;
        	justify-content: center;
        }
		.sidebar-item-content ul li:not(:first-child) {
		    margin-top: 8px;
		}
		.sidebar-item-content ul li img {
		    width: 17px;
            height: auto;
            display: inline-block;
            vertical-align: middle;
		}
		.social-links {
		    margin-top: 20px;
		}
		.social-links p {
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    color: #6E6E6E;
		    font-size: 10px;
		}
		.sidebar-item-content ul li, .sidebar-item ul li a {
		    font-family: 'Poppins', sans-serif;
		    font-size: 14px;
		    color: #6E6E6E;
		    text-decoration: none;
		}
		.sidebar-item-content ul li a {
		    display: inline-block;
		    vertical-align: middle;
		}
        .social-profile {
        	margin-top: 10px;
        	display: flex;
        	flex-flow: wrap row;
        	gap: 10px;
        }
		.social-profile a {
		    width: calc(33% - 20px);
		    text-align: center;
		    display: inline-block;
		    vertical-align: top;
		    min-width: 75px;
		    font-size: 10px;
		    color: #9F9F9F;
		    text-decoration: none;
		    padding: 8px 5px;
		    background-color: #FBFBFB;
		    border: 1px solid #E8E8E8;
		    border-radius: 30px;
		}
		.social-profile a i {
		    color: <?php echo $color_bg; ?>;
		    margin-right: 5px;
		    font-size: 12px;
		}
		.social-profile a .fa {
		    font-family: FontAwesome;
		}
		.social-profile a:hover {
		    background-color: <?php echo $color_bg; ?>;
		    color: #ffffff;
		    border-color: <?php echo $color_bg; ?>;
		}
		.social-profile a:hover i{
			color: #ffffff;
		}
		.sidebar-item.tags {
		    background-color: transparent;
		    text-align: center;
		}
		.sidebar-item.tags a {
		    min-width: 75px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            font-size: 10px;
            color: #9F9F9F;
            text-decoration: none;
            padding: 8px 5px;
            background-color: #ffffff;
            border: 1px solid #E8E8E8;
            border-radius: 30px;
            width: calc(24% - 10px);
            margin: 0 5px 10px;
		}
		.sidebar-item.tags a:hover {
		    background-color: <?php echo $color_bg; ?>;
		    color: #ffffff;
		    border-color: <?php echo $color_bg; ?>;
		}
		.portal-contents {
			position: relative;
			left: 0;
		    width: calc(70% - 30px);
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		    transition: all 0.3s ease 0s;
		}
		.content-item {
		    width: calc(50% - 55px);
		    background-color: #ffffff;
		    padding: 20px;
		    text-align: center;
		    margin-bottom: 30px;
		    position: relative;
            transition: all 0.3s ease 0s;
            top: 0;
		}
		.content-item:hover {
            box-shadow: 0 0 15px 0px rgba(0,0,0,0.1);
            transition: all 0.3s ease 0s;
            top: -3px;
        }
        .content-item .icon {
        	display: flex;
        	position: absolute;
        	left: 25px;
        	top: 25px;
        	width: 60px;
        	height: 60px;
        	line-height: 60px;
        	background-color: #5a5a5a;
        	align-items: center;
        	justify-content: center;
        }
        .content-item .icon img {
            display: inline-block;
            vertical-align: middle;
            width: 28px;
            height: auto;
        }
        .content-item.two-column .icon {
        	position: relative;
        	top: initial;
        	left: initial;
        	margin: 10px auto;
        	margin-bottom: 22px;
        }
		.content-item h3 {
		    font-family: 'Poppins', sans-serif;
		    text-transform: uppercase;
		    font-size: 16px;
		    font-weight: 600;
		    color: #555555;
		    margin: 7px 0 10px;
		}
		.content-item p {
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    font-size: 14px;
		    color: #6E6E6E;
		    line-height: 1.6;
		}

		.content-item .content-link a {
        	color: #fff;
        	background-color: <?php echo $color_bg; ?>;
        	line-height: 35px;
        	padding: 0 20px;
        	display: inline-block;
        }

        .content-item .content-link {
        	padding-top: 23px;
        }


		/*.content-link {
		    padding-top: 25px;
		    border-top: 1px solid #EFEFEF;
		}*/
		/*.content-link a{
		    font-family: 'Poppins', sans-serif;
		    font-size: 13px;
			display: inline-block;
			vertical-align: top;
			color: <?php echo $color_bg; ?>;
			font-weight: 600;
			text-decoration: none;
			text-transform: uppercase;
			display:block;
		}*/
		.content-link a:hover {
            background-color: #A0A6AB;
            color: #ffffff;
        }
		.content-item.one-column {
		    width: 100%;
		    position: relative;
		    padding-left: 110px;
		    text-align: left;
		    padding-bottom: 100px;
		}
		.content-item.one-column img.iconimg {
		    margin: 0;
		    position: absolute;
		    left: 30px;
		    top: 25px;
		}
		.content-item.one-column .content-link {
            padding-top: 25px;
            border-top: 0;
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }
        .content-item.one-column .content-link::after {
            content: "";
            position: absolute;
            top: 0;
            left: 90px;
            right: 0;
            border-top: 1px solid #EFEFEF;
        }
		.content-item.one-column.get-direction {
		    padding: 20px;
		    display: flex;
		    flex-flow: wrap row;
		}
		.content-item-icon {
		    width: 100px;
		    text-align: center;
		}
		.content-item.one-column.get-direction img {
		    position: relative;
		    top: 0;
		    left: 0;
		}
		.content-item-details {
		    width: calc(100% - 120px);
		    padding-left: 20px;
		}
		.map-image {
		    width: 100%;
		    margin-top: 35px;
		}

		.about-image {
		    width: 100%;
		    margin-top: 25px;
		}

		.map-image img{
			width: 100%;
		}
		.content-item.two-column {
            padding-bottom: 100px;
        }
        .content-item.two-column .content-link {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
        }

        .miyngreetings, .miyngooglemap {
            margin-left: 90px;

        }


        .account_left p {
            margin-top: 1px;
            font-family: poppins;
            font-size: 14px;
            color: #6E6E6E;
        }


        .account_left, .account_right {
            float: none !important;
            margin-bottom: -1px;
            padding: 6px 0 0;
        }

        .account_left {
            margin-right: 68px;
        }

        .sidebar-item {
            clear: both;
        }

        .sidebar-item .account_right a {
            width: 26%;
            position: absolute;
            right: 20px;
            float: right;
            margin-top: -62px;
            background: <?php echo $color_bg; ?>;
            color: #fff;
            padding: 11px 12px 10px 24px;
            top: 84px;
        }

        .account_right a {
            text-decoration: none;
        }

        .sidebar-item .account_right a {
            width: 48%;
            margin-left: 0;
            float: right;
            margin-top: -62px;
        }

        .account_left p {
            margin-top: 1px;
        }

        .sidebar-item .account_right a:hover {
            color: #fff;
        }

        .portal-sidebar {
            position: relative;
        }

        .account_left, .account_right {
            float: none !important;
        }
        .sidebar-item .account_right a {
            width: 27%;
            position: absolute;
            right: 8px;
            float: right;
            margin-top: -62px;
            background: <?php echo $color_bg; ?>;
            color: #fff;
            padding: 13px 12px 13px 27px;
            margin-left: -52px;
            top: 84px;
        }
        .login-block.my-account-block {
            display: none;
        }

        .portal-footer {
        	background-color: <?php echo $color_bg; ?>;
        	padding: 20px 0;
        }
        .client-portal-footer-top .uper {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	gap: 30px;
        	margin-bottom: 10px;
        }
        .client-portal-footer-top .uper a {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            line-height: 23px;
        }
        .client-portal-footer-top .bottom {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        }
        .client-portal-footer-top .bottom a {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 400;
            color: #fff;
            text-decoration: none;
            line-height: 23px;
            position: relative;
        }
        .client-portal-footer-top .bottom a::after {
        	content: 'l';
        	margin-left: 15px;
        	margin-right: 15px;
        	color: #fff;
        }
        .client-portal-footer-top .bottom a:last-child::after {
            display: none;
        }
        .client-portal-footer-bottom {
        	padding: 20px 0 0;
        }
        .client-portal-footer-bottom p {
        	margin: 0;
        	text-align: center;
        	font-size: 13px;
        	color: #fff;
        }
        @media  screen and (max-width: 1199px){
            .my-account-block {
                flex-flow: wrap row;
            }
            .my-account-block .sidebar-item-content {
                width: 100%;
            }
            .my-account-block .my-account-button {
                padding: 0;
                width: 100%;
                margin-top: 10px;
            }
            .my-account-button a {
                max-width: 200px;
            }
        }

        @media  screen and (max-width: 991px){
        	.portal-banner {
        	    padding-top: 150px;
        	}
        	.portal-sidebar {
        		width: 100%;
        		order: 2;
        	}
        	.sidebar-item.my-account-block{
        	    display: none;
        	}
        	.portal-contents {
        	    width: 100%;
        		order: 1;
        	}
        	.login-block.my-account-block > div {
                width: 50%;
                margin: 0;
            }
        	.login-block.my-account-block {
                display: flex;
                width: 100%;
                background-color: #ffffff;
                padding: 20px;
                margin-bottom: 20px;
            }
            .login-block.my-account-block .my-account-button {
                text-align: right;
            }
            .my-account-button a {
                max-width: 200px;
                text-align: center;
                display: inline-block;
                width: 100%;
            }
        }

        @media  screen and (max-width: 575px){
        	.content-item.two-column {
        	    width: 100%;
        	}
        	.heading-title h2 {
        	    font-size: 20px;
        	}
            q
        }
        @media  screen and (max-width: 480px){
        	.logo-area {
        	    width: 80px;
        	}
        	.logo {
        	    width: 80px;
        	    height: 80px;
        	}
        	.heading-title {
        	    width: calc(100% - 120px);
                padding: 10px 0 10px 20px;
        	}
        	.heading-title h2 {
        	    font-size: 18px;
        	}
        	.heading-title h3 {
                font-size: 13px;
            }
            .login-block.my-account-block > div {
                width: 100%;
            }
        	.login-block.my-account-block {
                flex-flow: wrap row;
            }
            .my-account-block .sidebar-item-content {
                width: 100%;
            }
            .login-block.my-account-block .my-account-button {
                text-align: left;
                width: 100%;
                padding: 0;
                margin-top: 15px;
            }
            .client-portal-footer-top .bottom {
            	flex-wrap: wrap;
            }
        }


        /* LOADER */
          .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('{{config('app.cdn_url')}}/images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }


            .sidebar-item-content-work-time ul {
                list-style: none;
            }
            .sidebar-item-content-work-time ul li span {
                color: #6E6E6E;
                position: relative;
                display: inline-block;
                line-height: 32px;
            }
            .sidebar-item-content-work-time ul li span:first-child {
                width: 95px;
                color: #333333;
            }
            .sidebar-item-content-work-time ul li span:last-child::after {
                content: ":";
                position: absolute;
                top: 0;
                left: 0;
            }
            .sidebar-item-content-work-time ul li span:last-child {
                padding-left: 10px;
            }
            .client-portal-footer-bottom img {
                max-width: 48px;
            }
            .client-portal-footer-bottom-logo {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 4px;
            }


</style>


<?php
$iframe = request()->iframe;
if($iframe !="yes") { ?>

    <script type='text/javascript' charset='utf-8'>
    window.onload = function() {
        MIYNLive.init({
    		uid: '{{$uid}}',
    		ui: true,
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

              $bgimagepath = "";

              if($global_business_info->background_image!="") {
                  $bgimagepath = $global_business_info->background_image;
              } else {
                  $bgimagepath = "1238353701.jpg";
              }




        ?>


        <?php

            $headerbg = "";
            $logoimg = "";
            $aboutimg = "";


            if(is_file(config('app.apps_url')."/images/business_bg/".$bgimagepath)) {

                $headerbg = url(config('app.apps_url')."/images/business_bg/".$bgimagepath);

            } else {

                $headerbg = url(asset("images/MIYN_landing_page_login_bg.jpg"));

            }

            

            if(is_file(config('app.apps_url')."/images/business_logo/".$global_business_info->logo_image)) {

                $logoimg = url(config('app.apps_url').'/images/business_logo/'.$global_business_info->logo_image);

            } else{

                $logoimg = url(asset('/images/miyn_logo.png'));


            }

            if(is_file(config('app.apps_url')."/images/business_banner/".$global_business_info->photo_url)) {

                $aboutimg = '<img src="'.config('app.apps_url').'/images/business_banner/'.$global_business_info->photo_url.'" alt="About us">';

            } else{
                $aboutimg = '<img src="'.config('app.live_url').'/images/asset/banner-bg.png" alt="About us">';
            }

        ?>

        <div class="portal-banner sections section" style="background-image: url('<?php echo $headerbg; ?>') ">
            <div class="heading-area">
            	<div class="container">
            		<div class="heading-content">
            			<div class="logo-area">
            				<div class="logo" style="background-image: url('<?php echo $logoimg; ?>')">
            				</div>
            			</div>
            			<div class="heading-title">
            				<h2 class=""> {{ $global_business_info->business_name ?? '' }}</h2>
            				<h3 class=""> {{ $global_business_info->b_address ?? '' }}</h3>
            			</div>
            		</div>
            	</div>
            </div>
    	</div>

    	<div class="main-content-area sections section">
    		<div class="container">
    			<div class="content-area">
    				<div class="portal-sidebar">
    				    <div class="sidebar-item my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Already a clients?</h3>
    							<p>Login to your account</p>
    						</div>
							<div class="my-account-button">
								<a href="#" class=" miynacc">My Accounts</a>
							</div>
    					</div>

    					<div class="sidebar-item my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Admin Dashboard</h3>
    						</div>
  							<div class="my-account-button">
  								<a target="_blank" href="https://miyn.app/signin/?action=logout" class="">Dashboard</a>
  							</div>
    					</div>

    					<div class="sidebar-item">
    						<h3>ABOUT US</h3>
    						<div class="sidebar-item-content">
    							<p> </p>
    						</div>
    						<div class="sidebar-gallery">

                             <?php echo $aboutimg; ?>
    						</div>
    					</div>

    					<div class="sidebar-item">
    						<h3>Work hours</h3>
    						<div class="sidebar-item-content-work-time">
    							<ul>
                    <?php
                      $amv = "";
                      $amh = "";
                      $pmh = "";



                      foreach ($business_week_work_days as $key => $value) {

                        if($value->starttime_h > 12)  {
                          $amv = "PM";
                          $amh = $value->starttime_h- 12;
                        } else {
                          $amh = $value->starttime_h;
                          $amv = "AM";
                        }

                        if($value->endtime_h > 12)  {
                          $pmv = "PM";
                          $pmh = $value->endtime_h- 12;
                        } else {
                          $pmh = $value->endtime_h;
                          $pmv = "AM";
                        }

                    ?>
									     <li><span><?php echo $days[$key]->full_name; ?></span><span>{{$amh}} {{$value->starttime_m}} {{$amv}}  to {{$pmh}} {{$value->endtime_m}} {{$pmv}} </span></li>
                    <?php
                      }
                    ?>
    							</ul>
    						</div>
    					</div>

    					<div class="sidebar-item">
    						<h3>CONTACT US</h3>
    						<div class="sidebar-item-content">
    							<ul>

                    <?php
                    $urlStr = '';
                    $parsed = parse_url($global_business_info->b_website);
                    if (empty($parsed['scheme'])) {
                        $urlStr = 'http://' . ltrim($global_business_info->b_website, '/');
                    }

                    ?>

                    @if($global_business_info->b_phone != "")
    					<li>
                            <span><img src="{{config('app.live_url')}}/images/contact/phone.png" alt="phone"></span><a href="tel:{{ $global_business_info['country']->country_code }} {{ $global_business_info->b_phone ?? '' }}"> {{ '+' }}{{ $global_business_info['country']->country_code }}{{ $global_business_info->b_phone ?? '' }}</a>
                        </li>
                    @endif

                    @if($global_business_info->b_address != "")
    					<li>
                            <span><img src="{{config('app.live_url')}}/images/contact/location.png" alt="location"></span><a href="#" class="ng-binding">{{ $global_business_info->b_address ?? '' }}</a>
                        </li>
                    @endif

                    @if($global_business_info->b_email != "")
    					<li>
                            <span><img src="{{config('app.live_url')}}/images/contact/Mail.png" alt="email"></span><a href="mailto:{{ $global_business_info->b_email ?? '' }}" class="ng-binding">{{ $global_business_info->b_email ?? '' }}</a>
                        </li>
                    @endif

                    @if($global_business_info->b_website != "")
                        <li>
                            <span><img src="{{config('app.live_url')}}/images/contact/Web.png" alt="email"></span><a href="{{ $urlStr ?? '' }}" target="_blank" class="ng-binding">{{ $global_business_info->b_website ?? 'No website link added' }}</a>
                        </li>
                    @endif

    							</ul>
    						</div>

    					</div>

    				</div>

    				<div class="portal-contents">
    				    <div class="login-block my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Already a client?</h3>
    							<p>Login to your account</p>
    						</div>
							<div class="my-account-button">
								<a href="#">My Accounts</a>
							</div>
    					</div>


    					<!-- ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  false  " class="content-item two-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/schedule-icon.png" alt="logo"></span>
    						<h3 class="ng-binding">Schedule </h3>
    						<p class="ng-binding">Want to setup an appointment? Easy. Choose a time that suits you and we'll confirm fast.</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miynschedule" href="#">Schedule</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  false  " class="content-item two-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/phone-icon.png" alt="logo"></span>
    						<h3 class="ng-binding">Phone call </h3>
    						<p class="ng-binding">Want to let your fingers to the walking? Give us a call, we're waiting for your call.</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miyncall" href="tel:{{ $global_business_info->b_phone ?? '' }}">Phone call</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  false  " class="content-item two-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/send-file-icon.png" alt="logo"></span>
    						<h3 class="ng-binding">Send us a file </h3>
    						<p class="ng-binding">Need to upload some important files? Place them here and they'll be safe, and secure sent to our inbox.</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miynfile" href="#">Send us a file</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  false  " class="content-item two-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/get-a-quote.png" alt="logo"></span>
    						<h3 class="ng-binding">Get a quote </h3>
    						<p class="ng-binding">Need fast price or availability information? We've got you covered. Let's get started.</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miynquote" href="#">Get a quote</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="true  false  " class="content-item one-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/like-here-icon.png" alt="logo"></span>
    						<h3 class="ng-binding">We would like to hear from you </h3>
    						<p class="ng-binding">Tell us what's on your mind or send us a note. We promise we'll read it.</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg --><div class="about-image ng-scope" ng-if="myImg">
								<img src="{{config('app.apps_url')}}/images/assets/we_would_like_to_hear_from_you.jpg" style="width:100%">
    						</div><!-- end ngIf: myImg -->
    						<div class="content-link">
    							<a class="miyngreetings" href="#">We would like to hear from you</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  true  " class="content-item one-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/direction-icon.png" alt="logo"></span>
    						<h3 class="ng-binding">Get directions </h3>
    						<p class="ng-binding">Need directions to our location? We look forward to earning your business.</p>

    						<!-- ngIf: myGoogle --><div class="map-image ng-scope" ng-if="myGoogle">
								<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBhDZ-X-FmlL7R9vg4VA7843bel7S4GOac&q=<?php echo $business_address; ?>"  width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    						</div><!-- end ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miyngooglemap" href="#">Get directions</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions --><div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="false  false  " class="content-item two-column     ng-not-empty">
    					    <span class="icon"><img src="{{config('app.live_url')}}/images/asset/chat-now.png" alt="logo"></span>
    						<h3 class="ng-binding">Chat </h3>
    						<p class="ng-binding">Want to live chat now?</p>

    						<!-- ngIf: myGoogle -->
    						<!-- ngIf: myImg -->
    						<div class="content-link">
    							<a class="miynchat" href="#">Chat</a>
    						</div>
    					</div><!-- end ngRepeat: selectedactions in actions -->



    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="portal-footer sections section">
    	    <div class="container-wrapper">
                <div class="client-portal-footer">
    			    <div class="client-portal-footer-top">
    			        <div class="uper">
    			            <a href="#">Home</a>
            			    <a href="#">Inbox</a>
            			    <a href="#">Payments</a>
            			    <a href="#">About us</a>
    			        </div>
    			        <div class="bottom">
    			            <a href="#" class="miynschedule">Schedule</a>
            			    <a href="#" class="miyncall">Call now</a>
            			    <a href="#" class="miynquote">Quote</a>
            			    <a href="#" class="miynchat">Live chat</a>
            			    <a href="#" class="miyngreeting">Details</a>
    			        </div>
    			    </div>
    			    <div class="client-portal-footer-bottom">
    			        <p>Copyright All right Reserved © {{ date('Y') }} MIYN Lead Generation</p>
    			        <p class="client-portal-footer-bottom-logo">Driven by <a target="_blank" href="{{config('app.main_url')}}"><img class="miyn-popup-brand" src="{{config('app.cdn_url')}}/images/MIYN-popup-logo-120x30.png"></a></p>
    			    </div>
    			</div>
    	    </div>
    	</div>

    	<style type="text/css">

            .container h2{
                margin: 20px 0px 20px 0px;
                padding: 0px 0px 0px 0px;
                text-shadow: ;
                text-transform: none;

            }

            @media (min-width: 768px) and (max-width: 991px) {
                .container h2{
                    margin: ;
                    padding: ;
                }
            }
            @media (max-width: 767px) {
                .container h2{
                    margin: ;
                    padding: ;
                }
            }

    	</style>

    	<?php
            }
        ?>

    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();

        $('body').on('change', '*', function() {
            console.log('Change anythings');
            new WOW().init();
        });

    </script>




</html>
