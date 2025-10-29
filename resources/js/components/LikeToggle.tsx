import { Heart, LoaderCircle } from "lucide-react";
import { Puppy, SharedData } from '../types';
import { Link, usePage } from '@inertiajs/react';
import { clsx } from 'clsx';


export function LikeToggle({
  puppy,
}: {
  puppy: Puppy;
}) {
    const { auth } = usePage<SharedData>( ).props;
  return (
    <Link
        preserveScroll
      className={clsx('group', !auth.user && 'cursor-not-allowed')}
      disabled={!auth.user}
      method="patch"
      href={route('puppies.like', puppy.id)}
    >
    <LoaderCircle className="hidden animate-spin stroke-slate-300 group-data-loading:block" />
    <Heart
      className={clsx(
          auth.user && puppy.likedBy.includes(auth.user.id)
              ? "fill-pink-500 stroke-none"
              : "stroke-slate-200 group-hover:stroke-slate-300",
          "group-data-loading:hidden"
      )
      }
    />
    </Link>
  );
}
