	<? include "header.php" ?>

<!-- Sidenav/menu -->
<? include "menu.php" ?>

<!-- !PAGE CONTENT! -->
<div class="abc-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="abc-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>

    <div class="abc-row-padding abc-margin-bottom">
        <div class="abc-quarter">
            <a href="/admin/blog" style="text-decoration: none;">
                <div class="abc-container abc-red abc-padding-16">
                    <div class="abc-left"><i class="fa fa-pencil abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['blog']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Blog</h4>
                </div>
            </a>
        </div>
        <div class="abc-quarter">
            <a href="/admin/news" style="text-decoration: none;">
                <div class="abc-container abc-purple abc-padding-16">
                    <div class="abc-left"><i class="fa fa-newspaper-o abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['news']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Notícias</h4>
                </div>
            </a>
        </div>
        <div class="abc-quarter">
            <a href="/admin/testimonials" style="text-decoration: none;">
                <div class="abc-container abc-blue abc-padding-16">
                    <div class="abc-left"><i class="fa fa-comments-o abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['testemunhos']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Testemunhos</h4>
                </div>
            </a>
        </div>
        <div class="abc-quarter">
            <a href="/admin/team" style="text-decoration: none;">
                <div class="abc-container abc-teal abc-padding-16">
                    <div class="abc-left"><i class="fa fa-users abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['team']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Equipa</h4>
                </div>
            </a>
        </div>
    </div>
    <div class="abc-row-padding abc-margin-bottom">
        <div class="abc-quarter">
            <a href="/admin/messages" style="text-decoration: none;">
                <div class="abc-container abc-lime abc-text-white abc-padding-16">
                    <div class="abc-left"><i class="fa fa-envelope abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['mensagens']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Mensagens</h4>
                </div>
            </a>
        </div>
        <div class="abc-quarter">
            <a href="/admin/admins" style="text-decoration: none;">
                <div class="abc-container abc-orange abc-text-white abc-padding-16">
                    <div class="abc-left"><i class="fa fa-cog abc-xxxlarge"></i></div>
                    <div class="abc-right">
                        <h3><?=$amounts['admins']?></h3>
                    </div>
                    <div class="abc-clear"></div>
                    <h4>Administradores</h4>
                </div>
            </a>
        </div>
    </div>
<!--
  <div class="abc-container abc-section">
    <div class="abc-row-padding" style="margin:0 -16px">
      <div class="abc-third">
        <h5>Regions</h5>
        <img src="/abcimages/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="abc-twothird">
        <h5>Feeds</h5>
        <table class="abc-table abc-striped abc-white">
          <tr>
            <td><i class="fa fa-user abc-blue abc-padding-tiny"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell abc-red abc-padding-tiny"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users abc-orange abc-text-white abc-padding-tiny"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment abc-red abc-padding-tiny"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark abc-light-blue abc-padding-tiny"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop abc-red abc-padding-tiny"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt abc-green abc-padding-tiny"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="abc-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="abc-progress-container abc-grey">
      <div id="myBar" class="abc-progressbar abc-green" style="width:25%">
        <div class="abc-center abc-text-white">+25%</div>
      </div>
    </div>

    <p>New Users</p>
    <div class="abc-progress-container abc-grey">
      <div id="myBar" class="abc-progressbar abc-orange" style="width:50%">
        <div class="abc-center abc-text-white">50%</div>
      </div>
    </div>

    <p>Bounce Rate</p>
    <div class="abc-progress-container abc-grey">
      <div id="myBar" class="abc-progressbar abc-red" style="width:75%">
        <div class="abc-center abc-text-white">75%</div>
      </div>
    </div>
  </div>
  <hr>

  <div class="abc-container">
    <h5>Countries</h5>
    <table class="abc-table abc-striped abc-bordered abc-border abc-hoverable abc-white">
      <tr>
        <td>United States</td>
        <td>65%</td>
      </tr>
      <tr>
        <td>UK</td>
        <td>15.7%</td>
      </tr>
      <tr>
        <td>Russia</td>
        <td>5.6%</td>
      </tr>
      <tr>
        <td>Spain</td>
        <td>2.1%</td>
      </tr>
      <tr>
        <td>India</td>
        <td>1.9%</td>
      </tr>
      <tr>
        <td>France</td>
        <td>1.5%</td>
      </tr>
    </table><br>
    <button class="abc-btn">More Countries &nbsp;<i class="fa fa-arrow-right"></i></button>
  </div>
  <hr>
  <div class="abc-container">
    <h5>Recent Users</h5>
    <ul class="abc-ul abc-card-4 abc-white">
      <li class="abc-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="abc-closebtn abc-padding abc-margin-right abc-medium">x</span>
        <img src="/abcimages/avatar2.png" class="abc-left abc-circle abc-margin-right" style="width:35px">
        <span class="abc-xlarge">Mike</span><br>
      </li>
      <li class="abc-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="abc-closebtn abc-padding abc-margin-right abc-medium">x</span>
        <img src="/abcimages/avatar5.png" class="abc-left abc-circle abc-margin-right" style="width:35px">
        <span class="abc-xlarge">Jill</span><br>
      </li>
      <li class="abc-padding-16">
        <span onclick="this.parentElement.style.display='none'" class="abc-closebtn abc-padding abc-margin-right abc-medium">x</span>
        <img src="/abcimages/avatar6.png" class="abc-left abc-circle abc-margin-right" style="width:35px">
        <span class="abc-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="abc-container">
    <h5>Recent Comments</h5>
    <div class="abc-row">
      <div class="abc-col m2 text-center">
        <img class="abc-circle" src="/abcimages/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="abc-col m10 abc-container">
        <h4>John <span class="abc-opacity abc-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="abc-row">
      <div class="abc-col m2 text-center">
        <img class="abc-circle" src="/abcimages/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="abc-col m10 abc-container">
        <h4>Bo <span class="abc-opacity abc-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="abc-container abc-dark-grey abc-padding-32">
    <div class="abc-row">
      <div class="abc-container abc-third">
        <h5 class="abc-bottombar abc-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="abc-container abc-third">
        <h5 class="abc-bottombar abc-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="abc-container abc-third">
        <h5 class="abc-bottombar abc-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

-->
</div>

<? include "footer.php" ?>