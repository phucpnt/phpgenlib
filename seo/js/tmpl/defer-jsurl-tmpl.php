<?php
/*
  Copyright 2012  Phuc PN.Truong  (email : pn.truongphuc@exto.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

?>
<script type="text/javascript">
    var jsList = <?php echo json_encode($jsList);?>;
    // Add a script element as a child of the body
    function downloadJSAtOnload($jsFile) {
        var element = document.createElement("script");
        element.src = $jsFile;
        document.body.appendChild(element);
    }

    function deferJSList(){
        for(var i= 0; i < jsList.length; i++){
            downloadJSAtOnload(jsList[i]);
        }
    }
    // Check for browser support of event handling capability
    if (window.addEventListener)
        window.addEventListener("load",deferJSList, false);
    else if (window.attachEvent)
        window.attachEvent("onload",deferJSList);
    else window.onload = deferJSList;
</script>