<div class="col-md-8">       
    <h2>Contact Us</h2>


    <div class="row">
        <div class="col-md-8">
            <div class="well ">
                <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Pilih Subjek:</option>
                                <option value="service">Bug</option>
                                <option value="suggestions">Kritik & Saran</option>
                                <option value="product">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-default pull-right" id="btnContactUs" disabled>
                            Send Message  <i class="fa fa fa-paper-plane-o"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
                    <div class="col-md-4">
                <form>
                    <legend><span class="fa fa-globe"></span> IBTEAM : Jabodetabek</legend>
                    <address>
                        <strong>Indonesian Backtrack Team</strong><br>
                        Jl.Pahlawan No.44<br>
                        Gedung Yarnati Lt.3 , Jakarta Pusat<br>
                        <abbr title="Phone">
                            P:</abbr>
                        (0896)-1000-0978
                    </address>
                    <address>
                        <strong>Full Name</strong><br>
                        <a href="mailto:info@indonesianbacktrack.or.id">info@indonesianbacktrack.or.id</a>
                    </address>
                </form>
        </div>

    </div>

         
         
</div>