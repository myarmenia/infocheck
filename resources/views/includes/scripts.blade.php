<script src="/js/jquery.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/functions.js"></script>
<script src="/js/greedyNav.js"></script>
<script src="/js/jquery.jscroll.min.js"></script>
<script>
//$('ul.pagination').hide();
    $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });


</script>
<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/locale-all.js'></script>
<script src="/js/calen.js"></script>
{!!  $data['event']->script() !!}

