import { cn } from '@/lib/utils';
import React, { useEffect, useState } from 'react';

export function ImageUploadPreview({
                                       source,
                                       className,
                                       ...restProps
                                   }: {
    source: File | string | null;
    className?: string;
} & React.ImgHTMLAttributes<HTMLImageElement>) {
    const [src, setSrc] = useState<string | null>(null);

    useEffect(() => {
        let objectUrl: string | null = null;

        if (source instanceof File) {
            objectUrl = URL.createObjectURL(source);
            // Defer the state update to avoid the ESLint warning
            queueMicrotask(() => setSrc(objectUrl));

            return () => {
                URL.revokeObjectURL(objectUrl!);
            };
        } else {
            queueMicrotask(() => setSrc(source));
        }
    }, [source]);

    if (!src) return null;

    return <img src={src} className={cn('mt-4 h-24 rounded-md', className)} {...restProps} />;
}
