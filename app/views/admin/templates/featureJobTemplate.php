<!-- if job is close add row with class name "sold" -->
<?php foreach($data['job'] AS $job) : ?>
<tr>
	<td style="text-align: center;">
		<input type="checkbox" name="">
	</td>
	<td>
		<img src="assets/img/icons/img-06.jpg">
	</td>
	<td class="tittle-id">
		<h3><?=$job->jTitle;?></h3>
		<span>Ad ID: <?=$job->jId;?></span>
	</td>
	<td class="item-cat">
		<span>Laptops & PCs</span>	
	</td>
	<td>
		<span>Yes</span>
	</td>
	<td class="status-job">
		<span>Active</span>
	</td>
	<td class="price-loc">								
		<h3>P <?=$job->jSalary;?></h3>
		<span><?=$job->comLoc;?></span>
	</td>
	<td class="date-pub">								
		<h4 style="margin-bottom: 10px;"><?=$job->jDeadline;?></h4>
		<span>Published</span>
	</td>
	<td class="action-btn">
		<span class="eye" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
		<span class="pencil" data-jId="<?=$job->jId;?>"><i class="fal fa-pencil-alt"></i></span>
		<span class="trash" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
	</td>
</tr>
<?php endforeach; ?>