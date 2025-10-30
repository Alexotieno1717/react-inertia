import { Link } from '@inertiajs/react';
import type { PaginationLinks, PaginationMeta } from '@/types';
import { Button } from '@/components/ui/button';
import { cn } from '@/lib/utils';
import { ChevronLeft, ChevronRight } from 'lucide-react';

type paginationProps = {
    meta: PaginationMeta;
    links: PaginationLinks;
    className?: string;
};

export default function Pagination({ meta, links, className }: paginationProps) {

    return (
        <div className={cn('flex items-center justify-between', className)}>
            <div>
                {links.prev && (
                    <Button variant="ghost" asChild>
                        <Link href={links.prev} preserveScroll>
                            <ChevronLeft className="size-4" />
                            <span>Previous</span>
                        </Link>
                    </Button>
                )}
            </div>

            <p className="text-sm font-medium">
                Page {meta.current_page} of {meta.last_page}
            </p>

            <div>
                {links.next && (
                    <Button variant="ghost" asChild>
                        <Link href={links.next} preserveScroll>
                            <span>Next</span>
                            <ChevronRight className="size-4" />
                        </Link>
                    </Button>
                )}
            </div>
        </div>
    );
}
