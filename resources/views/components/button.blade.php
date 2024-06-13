<button {{ $attributes->class(['inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2', 
'bg-primary text-primary-foreground hover:bg-primary/90' => $type == 'default',
"bg-destructive text-destructive-foreground hover:bg-destructive/90" => $type == 'destructive',
"border border-input bg-background hover:bg-accent hover:text-accent-foreground" => $type == 'outline',
"bg-secondary text-secondary-foreground hover:bg-secondary/80" => $type == 'secondary',
"hover:bg-accent hover:text-accent-foreground" => $type == 'ghost',
"text-primary underline-offset-4 hover:underline" => $type == 'link'
]) }}>
    {{ $message }}
</button>