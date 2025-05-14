<div class="blog-details content" x-data="{ showForm: <?php if ((object) ('showForm') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showForm'->value()); ?>')<?php echo e('showForm'->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e('showForm'); ?>')<?php endif; ?> }">
    <div class="comments_area pb-5">
        <ul class="comment__list">
            <?php $__empty_1 = true; $__currentLoopData = $product->approvedReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li>
                    <div class="wn__comment d-flex" style="column-gap: 1rem;">
                        <div class="">
                            <?php if($review->user && $review->user->user_image): ?>
                                <img class="rounded-circle" src="<?php echo e(asset('storage/images/users/' . $review->user->user_image)); ?>" alt="" width="50">
                            <?php else: ?>
                                <img src="https://ui-avatars.com/api/?name=<?php echo e($review->user->name); ?>&background=0d8abc&color=fff" alt="<?php echo e($review->name); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="content d-flex" style="column-gap: 2rem;">
                            <div class="">
                                <strong><?php echo e($review->user->name); ?></strong>
                                <small class="comnt__author d-block d-sm-flex"><?php echo e($review->created_at ? $review->created_at->format('d M, Y') : ''); ?></small>
                                <div>
                                    <?php if($review->rating): ?>
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <i class="<?php echo e(round($review->rating) <= $i ? 'far' : 'fas'); ?> fa-star"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <p style="width: 100%; font-size: 14px;"><?php echo e($review->content); ?></p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <?php if($currentRatingId === $review->id): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <span x-on:click="showForm = !showForm"
                                            class="text-primary" style="cursor: pointer">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <br><br>
                                        <span x-on:click.prevent="return confirm('Are you sure?') ? window.livewire.find('<?php echo e($_instance->id); ?>').delete(<?php echo e($currentRatingId); ?>) : false"
                                              class="text-danger" style="cursor: pointer">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a class="m-2">Be the first to write your review!</a>
            <?php endif; ?>
        </ul>
    </div>
    <?php if(auth()->guard()->check()): ?>
    <div class="comment_respond" x-show="showForm">
        <?php if($canRate): ?>
            <?php if($showForm): ?>
                <h3 class="reply_title"><?php echo e($currentRatingId ? 'Your Rating' : 'Leave a Reply'); ?></h3>
                <form wire:submit.prevent="rate()" class="review__form score">
                    <div class="score-wrap">
                        <label for="star1">
                            <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                            <span class="stars-active" data-value="1">
                    <i class=" <?php if($rating >= 1 ): ?> fas fa-star <?php else: ?> far fa-star <?php endif; ?>" style="cursor: pointer"></i>
                </span>
                        </label>
                        <label for="star2">
                            <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                            <span class="stars-active" data-value="2">
                    <i class=" <?php if($rating >= 2 ): ?> fas fa-star <?php else: ?> far fa-star <?php endif; ?>" style="cursor: pointer"></i>
                </span>
                        </label>
                        <label for="star3">
                            <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                            <span class="stars-active" data-value="3">
                    <i class=" <?php if($rating >= 3 ): ?> fas fa-star <?php else: ?> far fa-star <?php endif; ?>" style="cursor: pointer"></i>
                </span>
                        </label>
                        <label for="star4">
                            <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                            <span class="stars-active" data-value="4">
                    <i class=" <?php if($rating >= 4 ): ?> fas fa-star <?php else: ?> far fa-star <?php endif; ?>" style="cursor: pointer"></i>
                </span>
                        </label>
                        <label for="star5">
                            <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                            <span class="stars-active" data-value="5">
                    <i class=" <?php if($rating >= 5 ): ?> fas fa-star <?php else: ?> far fa-star <?php endif; ?>" style="cursor: pointer"></i>
                </span>
                        </label>
                    </div>
                    <p><?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></p>
                    <div class="input__box text-left">
                        <textarea class="form-control" rows="5" wire:model.lazy="content"><?php echo e(old('review')); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="submite__btn">
                        <?php if($currentRatingId): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <button type="submit" class="btn btn-dark rounded shadow-lg">Update</button>
                                <button type="button" x-on:click="showForm = false" class="btn btn-secondary rounded shadow-lg">Close</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button type="submit" class="btn btn-dark rounded shadow-lg">Rate</button>
                        <?php endif; ?>

                    </div>

                </form>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <small>Must buy this product before write a review.</small>
            </div>
        <?php endif; ?>
    </div>
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-dark">
            Login to write a review!
        </a>
    <?php endif; ?>
</div>
<?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/livewire/shop/single-product-review-component.blade.php ENDPATH**/ ?>