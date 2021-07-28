<?php $__env->startSection('head-data'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($movies) > 0): ?>
        <form class="form-inline" method="post" action="<?php echo e(route('search-movie')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group row">
                <label for="searchTerm" class="col-sm-4 col-form-label">Search term</label>
                <div class="col-sm-6">
                    <input name="text" class="form-control" id="searchTerm" placeholder="Batman">
                </div>
            </div>
            <div class="form-group row" style="margin-left: 10px">
                <button type="submit" id="searchButton" style="margin-left: 20%" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Rating</th>
                <th scope="col">Year</th>
                <th scope="col">Actors</th>
                <th scope="col">Cover image</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($i); ?></th>
                        <td><?php echo e($movie->name); ?></td>
                        <td><?php echo e($movie->description); ?></td>
                        <td><?php echo e($movie->rating); ?></td>
                        <td><?php echo e($movie->year); ?></td>

                        <?php if(count($movie->movie_actors) > 0): ?>
                            <td>
                                <ul>
                                    <?php $__currentLoopData = $movie->movie_actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($actor->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>
                        <?php endif; ?>

                        <?php if($movie->image !== null && $movie->image !== ''): ?>
                            <td><img src="<?php echo e($movie->image); ?>" style="width: 90px; height: 150px"></td>
                        <?php else: ?>
                            <td>No image</td>
                        <?php endif; ?>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <h3>No movies in database</h3>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>