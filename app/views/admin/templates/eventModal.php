
	
		<div class="confirmationMessage eventContainer mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height:500px;margin-top:3%;over-flow:scroll;width:60%;">
			
		<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
			<h2 style="text-align:left;padding-left:30px;">Client's Event Details</h2>
                <div style="display:flex;flex-direction:row;justify-content: space-around;">
                    <div style="width: 45%;">
                        <div class="changepass-holder" style="padding:5px 30px;">
                            <div class="form-group half-form-group" style="width:100%;">
                                <input type="text" name="groom" class="form-control" value="<?=$data['eventData']->groom?>">
                                <label for="groom">Groom</label>
                            </div>
                        </div>
                        <div class="changepass-holder" style="padding:5px 30px;">
                            <div class="form-group">
                                <input type="text" name="bride" id="vendorName" class="form-control" value="<?=$data['eventData']->bride?>">
                                <label for="bride">Bride</label>
                            </div>
                        </div>
                        <div class="changepass-holder" style="padding:5px 30px;">
                            <div class="form-group">
                                <input type="text" name="budget" id="vendorFee" class="form-control" value="<?=$data['eventData']->budget;?>.00">
                                <label for="budget">Budget</label>
                            </div>
                        </div>
                        <div class="changepass-holder" style="padding:5px 30px;">
                            <div class="form-group">
                                <input type="text" name="location" id="vendorFee" class="form-control" value="<?=$data['eventData']->location;?>">
                                <label for="location">Location</label>
                            </div>
                        </div>  
                    </div>
                    <div class="datepicker" style="margin-top: 0;margin-left: 10px;">
                        <div class="datepicker-header" style="position: relative;">                                        
                            <div class="counter_text" style="background: #33333363;margin: 0;padding: 25px;border-radius: 5px;padding-top: 0;left: 0;margin-bottom: -10px;">
                                <span style="font-size: 15px;"><?=date("D. F j Y", strtotime($data['eventData']->forCountDown));?></span>
                                <p style="font-size: 30px;line-height: 0;">Wedding Day</p>
                            </div>
                        </div>
                    </div>  
                </div>
			</div>
			<div class="actionButtonModal" style="padding: 15px 30px;margin: 0;background: #3333331c;justify-content: right;">
				<button id="closeEventDetails">Close</button>
			</div>
		</div>