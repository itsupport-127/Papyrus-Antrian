
<?php if(auth()->user()->isAdmin()): ?>
    <?php
        $navGroups = [
            [
                'label' => null, // grup pertama gak perlu judul kategori
                'items' => [
                    ['route' => 'admin.dashboard', 'match' => ['admin.dashboard'], 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ],
            ],
            [
                'label' => 'Operasional',
                'items' => [
                    ['route' => 'admin.locations', 'match' => ['admin.locations', 'admin.locations.*', 'admin.counters', 'admin.counters.*', 'admin.categories', 'admin.categories.*', 'admin.booking-slots*'], 'label' => 'Lokasi & Reservasi', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['route' => 'admin.users', 'match' => ['admin.users', 'admin.users.*'], 'label' => 'Pengguna', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                ],
            ],
            [
                'label' => 'Data',
                'items' => [
                    ['route' => 'admin.customers', 'match' => ['admin.customers', 'admin.customers.*'], 'label' => 'Pelanggan', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                    ['route' => 'admin.reports', 'match' => ['admin.reports'], 'label' => 'Laporan', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                ],
            ],
            [
                'label' => 'Lainnya',
                'items' => [
                    ['route' => 'locations.index', 'match' => ['locations.index'], 'label' => 'Lihat Publik', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'external' => true],
                ],
            ],
        ];
        $isActiveGroup = fn (array $item) => request()->routeIs($item['match']);
    ?>

    
    <nav class="lg:hidden -mx-4 sm:-mx-6 px-4 sm:px-6 mb-4">
        <div class="flex items-center gap-1 overflow-x-auto pb-1">
            <?php $__currentLoopData = $navGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($item['route'])); ?>" <?php if($item['external'] ?? false): ?> target="_blank" <?php endif; ?>
                       class="<?php echo e($isActiveGroup($item) ? 'text-blue-700 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700/50'); ?> px-3 py-1.5 text-sm font-medium rounded-lg whitespace-nowrap shrink-0 transition-colors">
                        <?php echo e($item['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </nav>

    
    <aside class="hidden lg:block w-56 shrink-0">
        <nav class="sticky top-4 space-y-5">
            <?php $__currentLoopData = $navGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <?php if($group['label']): ?>
                        <p class="px-3 mb-1.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500"><?php echo e($group['label']); ?></p>
                    <?php endif; ?>
                    <div class="space-y-0.5">
                        <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $active = $isActiveGroup($item); ?>
                            <a href="<?php echo e(route($item['route'])); ?>" <?php if($item['external'] ?? false): ?> target="_blank" <?php endif; ?>
                               class="<?php echo e($active ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 font-semibold' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700/50 font-medium'); ?> flex items-center gap-2.5 px-3 py-2 text-sm rounded-lg transition-colors">
                                <svg class="w-4 h-4 shrink-0 <?php echo e($active ? 'text-blue-600 dark:text-blue-400' : 'text-slate-400 dark:text-slate-500'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($item['icon']); ?>" />
                                </svg>
                                <span class="truncate"><?php echo e($item['label']); ?></span>
                                <?php if($item['external'] ?? false): ?>
                                    <svg class="w-3 h-3 ml-auto shrink-0 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </aside>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/admin-sidebar.blade.php ENDPATH**/ ?>