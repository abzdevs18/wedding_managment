
<section class="main-tbl-container eventDetails">
    <section class="offices-msgs">
        <div class="alerts-notif" style="width: 66.66%;">
        <div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
            <div class="content-head">
            <h2>Event Details</h2>
            </div>
        <!-- 	<div class="changepass-holder" style="text-align: center;">
            <button class="tg-btn open-cat" type="button">Select Category</button>
            </div> -->
            <form id="eventForm">
            <div class="changepass-holder half-row" style="margin-top: 30px;">
                <div class="form-group half-form-group">
                <input type="text" name="date" class="form-control eventdate">
                <input type="hidden" name="forCount" class="form-control forCounter">
                <label for="date">Event Date</label>
                </div>
            </div>
            <div class="changepass-holder half-row">
                <div class="form-group half-form-group">
                <input type="text" name="bride" class="form-control">
                <label for="bride">Bride</label>
                </div>
                <div class="form-group half-form-group">
                <input type="text" name="groom" class="form-control">
                <label for="groom">Groom</label>
                </div>
            </div>
            <div class="changepass-holder half-row">
                <div class="form-group">
                <!-- <input type="text" name="budget" class="form-control"> -->
                
                <select id="sort-filter" name="budget">
                    <optgroup>
                        <option selected value="P20,000-P50,000">P20,000-P50,000</option>
                        <option value="P50,000-P100,000">P50,000-P100,000</option>
                        <option value="P100,0000-Above">P100,0000-Above</option>
                    </optgroup>
                </select>
                <label for="budget">Event Budget</label>
                </div>
            </div>
            <div class="changepass-holder half-row">
                <div class="form-group">
                <input type="text" name="location" class="form-control">
                <label for="location">Location</label>
                </div>
            </div>
            </form>
            <div class="prof-container">
            <div>
                <button class="tg-btn save-btn addEvent" type="button">Save</button>
            </div>
            </div>
        </div>
        </div>
        <div class="alerts-notif">
        
        <div id="map" style="width:100%;height:500px;display:none;"></>
        </div>
    </section>
</section>