from bootstrap.bootstrap import bootstrap

def main():
    from django.core.management import execute_manager
    import hackasaurus.settings

    execute_manager(hackasaurus.settings)

if __name__ == "__main__":
    bootstrap(main)
